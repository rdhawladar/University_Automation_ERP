<?php
/*
*      Robo Gallery     
*      Version: 1.6
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/

class rbsGalleryExport {
    const ATTACHMENT_MAX_AMOUNT = 1000;
    const DUPLICATE_PREFIX = 'copy_';
    const MODE_EXPORT_XML = 'xml';
    const MODE_EXPORT_ZIP = 'zip';
    const MODE_IMPORT_XML = 'xml';
    const MODE_IMPORT_ZIP = 'zip';
    const POSTMETA_ATTACHED_FILE = '_wp_attached_file';
    const POSTMETA_ATTACHMENT_METADATA = '_wp_attachment_metadata';
    const POSTMETA_IMAGES = 'rsg_galleryImages';
    const SPACE4  = '    ';
    const SPACE8  = '        ';
    const TAG_POST_DATA = 'post_data';
    const XML_DECLARATION = '<?xml version="1.0" encoding="utf-8" ?>';

    public $archivePath ;
    /**
     * Database connection
     *
     * @var wpdb
     */
    protected $wpdb;

    /**
     * Mode of importing/exporting posts
     *
     * @var string
     */
    protected $mode;

    /**
     * Base url of uploaded files
     *
     * @var string
     */
    protected $baseFileUrl;

    /**
     * Bath path of uploaded files
     *
     * @var string
     */
    protected $baseFilePath;

    /**
     * Base archive directory
     *
     * @var string
     */
    protected $archiveDir = ABSPATH;

    /**
     * Size(bytes) of chunk archive for splitting
     *
     * @var int
     */
    protected $archiveChunkSize = 0;

    /**
     * List files for exporting
     *
     * @var array
     */
    protected $exportFiles = array();

    /**
     * Duplicate mode of importing posts data.
     *
     * @var int
     */
    public $duplicate = 0;

    /**
     * Mapping archives
     * key: archive key
     * value: ZipArchive object
     *
     * @var ZipArchive[]
     */
    protected $archives = array();

    /**
     * Mapping archive files
     * key: file path
     * value: archive key
     *
     * @var array
     */
    protected $archiveFiles = array();

    /**
     * Mapping post ID
     * key: old post ID
     * value: new new ID
     *
     * @var array
     */
    protected $mappingPostIds = array();

    /**
     * Mapping attachment IDs
     * key: old attachment ID
     * value: new attachment ID
     *
     * @var array
     */
    protected $mappingAttachmentIds = array();

    /**
     * Shared error
     *
     * @var string
     */
    protected $error;

    /**
     * Import posts response
     *
     * @var array
     */
    protected $response;

    /**
     * @constructor
     */
    public function __construct()
    {
        global $wpdb;
        $uploadDir = wp_upload_dir();

        $this->wpdb = $wpdb;
        $this->baseFileUrl = $uploadDir['baseurl'];
        $this->baseFilePath = $uploadDir['basedir'] . DIRECTORY_SEPARATOR;
    }

    /**
     * Get error
     *
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set path for archive directory
     *
     * @param string $dir
     * @return void
     */
    public function setArchiveDir($dir)
    {
        $this->archiveDir = rtrim($dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    /**
     * Get path for archive directory
     *
     * @return string
     */
    public function getArchiveDir()
    {
        return $this->archiveDir;
    }

    /**
     * Set archive chunk size in byte
     *
     * @param int $size
     * @return void
     */
    public function setArchiveChunkSize($size)
    {
        $this->archiveChunkSize = abs((int)$size);
    }

    /**
     * Get archive chunk size in byte
     *
     * @return int
     */
    public function getArchiveChunkSize()
    {
        return $this->archiveChunkSize;
    }


    /**
     * Get export posts xml data for downloading
     *
     * @param array $args
     * @param string $fileName
     * @return bool
     */
    public function exportPostsXml(array $args = array(), $fileName = 'export.xml')
    {
        $this->mode = self::MODE_EXPORT_XML;

        $postsXml = $this->exportPosts($args);
        if ($this->error) {
            return false;
        }

        $this->sendDownloadHeader($fileName);
        echo $postsXml;
        return true;
    }

    /**
     * Send headers for force file download
     *
     * @param string $fileName
     * @return void
     */
    protected function sendDownloadHeader($fileName)
    {
        header('Content-Description: File Transfer');
        header('Content-type: text/xml; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
    } 

    /**
     * Send headers for force ziip file download
     *
     * @param string $fileName
     * @return void
     */
    protected function sendZipDownloadHeader($fileName, $filePath)
    {
        header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"".$fileName."\"");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ".filesize($filePath));
    }
    

    public function exportPostsZip(array $args = array(), $fileName = 'export')
    {
        $this->mode = self::MODE_EXPORT_ZIP;

        $postsXml = $this->exportPosts($args);
        if ($this->error) {
            return false;
        }
        
         if (!is_dir($this->archiveDir) && !mkdir($this->archiveDir, 0755, true)) {
            $this->error = __("Can't create directory for archive file.");
            return false;
        }

        //$archiveRootName = str_replace('.xml' , '', $fileName);
        $archiveRootName = $fileName;
        $fileNameXml = str_replace('.zip' , '.xml', $fileName);
        $this->clearArchive($archiveRootName);
        if ($this->error) {
            return false;
        }

        $zip = new ZipArchive();
        $typeExport = 0;
        if (0 == $this->archiveChunkSize) {
            $archivePath = "{$this->archiveDir}{$archiveRootName}";

            $zip->open($archivePath, ZipArchive::CREATE);

            $zip->addFromString( $fileNameXml, $postsXml);
            foreach ($this->exportFiles as $exportFile) {
            	//echo $this->baseFilePath . $exportFile;
                $zip->addFile($this->baseFilePath . $exportFile, $exportFile);
            }
        } else {
        	$typeExport = 1;
            $count = 1;
            $size = 0;
            $archivePath = "{$this->archiveDir}{$archiveRootName}.{$count}";
            $zip->open($archivePath, ZipArchive::CREATE);

            $zip->addFromString($fileNameXml, $postsXml);
            foreach ($this->exportFiles as $exportFile) {
                $fileSize = filesize($this->baseFilePath . $exportFile);
                if ($this->archiveChunkSize < $size + $fileSize) {
                    $zip->close();
                    $this->isCreatedArchive($archivePath);
                    if ($this->error) {
                        break;
                    }

                    $count++;
                    $size = 0;
                    $archivePath = "{$this->archiveDir}{$archiveRootName}.{$count}";
                    $zip->open($archivePath, ZipArchive::CREATE);
                }

                $zip->addFile($this->baseFilePath . $exportFile, $exportFile);
                $size += strlen(gzcompress(file_get_contents($this->baseFilePath . $exportFile)));
            }
        }
        $zip->close();
        $this->isCreatedArchive($archivePath);
        if ($this->error) {
            return false;
        }
        $this->archivePath = $archivePath;

        if( !$typeExport ){
        	$this->sendZipDownloadHeader( $archiveRootName, $archivePath );
        	readfile( $archivePath );
        }

        return true;
    }

    /**
     * Clear archive files by root name
     *
     * @param string $archiveRootName
     * @return bool|string
     */
    protected function clearArchive($archiveRootName)
    {
        $patternName = "{$archiveRootName}.*.zip";
        $chunks = glob($this->archiveDir . $patternName, GLOB_ERR);
        $chunks[] = $this->archiveDir . $archiveRootName . '.zip';

        foreach ($chunks as $chunk) {
            if (file_exists($chunk) && !unlink($chunk)) {
                $this->error = sprintf(__('Can not clear archive\'s file: "%s".'), $chunk);
                return false;
            }
        }
        return true;
    }

    /**
     * Check whether created archive
     *
     * @param string $archivePath
     * @return bool
     */
    protected function isCreatedArchive($archivePath)
    {
        if (!file_exists($archivePath)) {
            $this->error = sprintf(__("Didn't save archive with files \"%s\"."), basename($archivePath));
            return false;
        }
        return true;
    }

    /**
     * Get export posts data
     *
     * @param array $args
     * @return string
     */
    protected function exportPosts(array $args)
    {
        $args = array_merge(
            array(
                'posts_per_page' => 200,
                'offset'         => 0,
                'post_type'      => ROBO_GALLERY_TYPE_POST,
                'post_status'    => 'publish',
            ),
            $args,
            array(
                'orderby' => 'post_parent ID',
                'order'   => 'ASC'
           )
        );
        $step = 0;
        $out = '';

        $out .= self::XML_DECLARATION . PHP_EOL;
        $out .= '<posts>' . PHP_EOL;
        do {
            $args['offset'] = $args['posts_per_page'] * $step;
            $posts = get_posts($args);

            foreach ($posts as $post) {
                // convert stdClass to array
                $post = (array)$post;

                $out .= self::SPACE4 . '<' . self::TAG_POST_DATA . ' id="' . $post['ID'] . '">' . PHP_EOL;
                $out .= $this->getPostData($post, self::SPACE8);
                $out .= $this->getPostMetaData($post['ID'], self::SPACE8);
                $out .= $this->getAttachmentsData($post['ID'], self::SPACE8);
                $out .= self::SPACE4 . '</' . self::TAG_POST_DATA . '>' . PHP_EOL;

                if ($this->error) {
                    break;
                }
            }

            $step += 1;
        } while (count($posts) == $args['posts_per_page']);
        $out .= '</posts>' . PHP_EOL;

        if ($this->error) {
            return null;
        }
        return $out;
    }

    /**
     * Get export post data
     *
     * @param array $post
     * @param string $indent
     * @return string
     */
    protected function getPostData(array $post, $indent = '')
    {
        $post = $this->prepareExportData($post);
        return $this->getContent($post, 'post', $indent);
    }

    /**
     * Get export post meta data
     *
     * @param int $postId
     * @param string $indent
     * @return string
     */
    protected function getPostMetaData($postId, $indent = '')
    {
        $rows = get_post_meta($postId, '', true);
        $postMeta = array();

        foreach ($rows as $metaKey => $metaValues) {
        	if($metaKey!='rbs_gallery_id') $postMeta[$metaKey] = $metaValues[0];
        }
        $postMeta = $this->prepareExportData($postMeta);

        return $this->getContent($postMeta, 'postmeta', $indent);
    }

    /**
     * Get export post attachments data
     *
     * @param int $postId
     * @param string $indent
     * @return string
     */
    protected function getAttachmentsData($postId, $indent = '')
    {
        $images = $this->getMetaImages($postId);
        $attachments = $this->getAttachments($images);

        $out = $indent . '<attachments>' . PHP_EOL;
        foreach ($attachments as $attachment) {
            $out .= $indent .self::SPACE4 . '<post_data id="' . $attachment['ID'] . '">' . PHP_EOL;
            $out .= $this->getPostData($attachment, $indent . self::SPACE8);
            $out .= $this->getPostMetaData($attachment['ID'], $indent . self::SPACE8);
            $out .= $indent .self::SPACE4 . '</post_data>' . PHP_EOL;

            if (self::MODE_EXPORT_ZIP == $this->mode) {

                //$this->exportFiles[] = trim(str_replace($this->baseFileUrl, '', $attachment['guid']), '/');
                $attachmentFile = get_post_meta($attachment['ID'], self::POSTMETA_ATTACHED_FILE, true);
				$this->exportFiles[] = $attachmentFile;
            }
        }
        $out .= self::SPACE8 . '</attachments>' . PHP_EOL;

        return $out;
    }

    /**
     * Get export data content
     *
     * @param array $fields
     * @param string $wrapper
     * @param string $indent
     * @return string
     */
    protected function getContent(array $fields, $wrapper = '', $indent = '')
    {
        $out = '';
        $innerIndent = '';

        if ($wrapper) {
            $out = $wrapper ? ($indent . '<' . $wrapper . '>' . PHP_EOL) : '';
            $innerIndent = self::SPACE4;
        }
        foreach ($fields as $name => $value) {
            $out .= $indent . $innerIndent . '<' . $name . '>' . $value . '</' . $name . '>' . PHP_EOL;
        }
        if ($wrapper) {
            $out .= $indent . '</' . $wrapper . '>' . PHP_EOL;
        }

        return $out;
    }

    /**
     * Get post meta images
     *
     * @param int $postId
     * @return array
     */
    protected function getMetaImages($postId)
    {
        $images = get_post_meta($postId, self::POSTMETA_IMAGES, true);
        return is_array($images) ? $images : array();
    }

    /**
     * Get post attachments by ids
     *
     * @param array $ids
     * @return array
     */
    protected function getAttachments(array $ids)
    {
        $args =array(
            'post__in' => $ids,
            'post_type' => 'attachment',
            'posts_per_page' => self::ATTACHMENT_MAX_AMOUNT
        );
        $attachments = array();
        $result = array();

        // indexing by ID and convert stdClass to array
        foreach (get_posts($args) as $post) {
            $attachments[$post->ID] = (array)$post;
        }
        // sort to ids order
        foreach ($ids as $id) {
            if (!isset($attachments[$id])) {
                continue;
            }
            $result[$id] = $attachments[$id];
        }

        return $result;
    }

    /**
     * Prepare data for exporting:
     * - replacing html entities corresponding xml format
     *
     * @param array $data
     * @return array
     */
    protected function prepareExportData(array $data)
    {
        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $data[$key] = htmlentities($value, ENT_XML1);
            }
        }
        return $data;
    }


    /**
     * Import posts, postmeta, attachments from *.xml file
     *
     * @param string $fileXmlPath
     * @return array
     */
    public function importPostsXml($fileXmlPath)
    {
        $this->mode = self::MODE_IMPORT_XML;

        $xml = file_get_contents($fileXmlPath);
        return $this->importPosts($xml);
    }

    /**
     * Import posts, postmeta, attachments from archive
     *
     * @param string $archivePath
     * @return array
     */
    public function importPostsZip($archivePath, $realFileName= '')
    {
        $this->mode = self::MODE_IMPORT_ZIP;

        $this->response = array(
            'import' => array(
                'post' => 0,
                'element' => 0,
                'file' => 0,
            ),
            'duplicate' => array(
                'post' => 0,
                'element' => 0,
                'file' => 0,
            ),
            'skipped' => array(
                'post' => 0,
                'element' => 0,
                'file' => 0,
            ),
            'errors' => array()
        );

        $this->readArchive($archivePath);
        if ($this->error) {
            $this->response['errors'][] = $this->error;
            return $this->response;
        }
        $fileNameXml = basename($archivePath);
        if(isset($realFileName) && $realFileName )  $fileNameXml = $realFileName;
        $archiveRootName = preg_replace('/(\.[0-9]+)?\.zip$/', '', $fileNameXml);
        $postsXmlFile = "{$archiveRootName}.xml";
        if (!isset($this->archiveFiles[$postsXmlFile])) {
            $this->response['errors'][] = __("Can't find import xml file in archive.");
        }
        $archiveKey = $this->archiveFiles[$postsXmlFile];
        $archive = $this->archives[$archiveKey];
        $postsXml = $archive->getFromName($postsXmlFile);

        return $this->importPosts($postsXml);
    }

    /**
     * Import posts, postmeta, attachments from xml
     *
     * @param string $xml
     * @return array
     */
    public function importPosts($xml)
    {
        $this->response = array(
            'import' => array(
                'post' => 0,
                'element' => 0,
                'file' => 0,
            ),
            'duplicate' => array(
                'post' => 0,
                'element' => 0,
                'file' => 0,
            ),
            'skipped' => array(
                'post' => 0,
                'element' => 0,
                'file' => 0,
            ),
            'errors' => array()
        );

        if (!$this->validateXml($xml)) {
            $this->response['errors'][] = $this->error;
            return $this->response;
        }

        $xmlReader = new XMLReader();
        if(false === $xmlReader->xml($xml)) {
            $this->response['errors'][] = __("Can't set xml content for reading.");
            return $this->response;
        }

        while ($xmlReader->read() && self::TAG_POST_DATA != $xmlReader->localName);
        if (self::TAG_POST_DATA != $xmlReader->localName) {
            $this->response['errors'][] = __('Invalid document of import');
            return $this->response;
        }

        while (self::TAG_POST_DATA == $xmlReader->localName) {
            $xmlPostData = new SimpleXMLElement($xmlReader->readOuterXML());
            $postData = $this->convertPostData($xmlPostData);

            // reset shared error
            $this->error = null;
            $this->importPostData($postData);

            if ($this->error) {
                $this->response['errors'][] = $this->error;
                return $this->response;
            }

            $xmlReader->next(self::TAG_POST_DATA);
        }

        return $this->response;
    }

    /**
     * Import single post with postmeta, attachments
     *
     * @param array $postData
     * @return void
     */
    protected function importPostData(array $postData)
    {
        $post = $postData['post'];
        $postId = $this->findPost($post);

        if (null === $postId) {
            $newPostId = $this->insertPostData($postData);
            $newPostId && ($this->response['import']['post'] += 1);
        } elseif ($postId && 1 == $this->duplicate) {
            $newPostId = $this->duplicatePostData($postData);
            $newPostId && ($this->response['duplicate']['post'] += 1);
        } else {
            $this->response['skipped']['post'] += 1;
        }
    }

    /**
     * Insert post with postmeta, attachments
     *
     * @param array $postData
     * @return int|null
     */
    protected function insertPostData(array $postData)
    {
        $post = $postData['post'];
        $postMeta = isset($postData['postmeta']) ? $postData['postmeta'] : array();
        $attachments = isset($postData['attachments']) ? $postData['attachments'] : array();
        $attachmentIds = array();

        $postId = $this->insertPost($post);
        if (null === $postId) {
            return null;
        }

        foreach ($attachments as $attachmentData) {
            $attachmentId = $this->importAttachmentData($attachmentData);
            if ($attachmentId) {
                $attachmentIds[] = $attachmentId;
            }
        }

        if (!empty($attachmentIds)) {
            $postMeta[self::POSTMETA_IMAGES] = $attachmentIds;
        }
        $this->addPostMeta($postId, $postMeta);

        return $postId;
    }

    /**
     * Duplicate post with postmeta, attachments
     *
     * @param array $postData
     * @return int|null
     */
    protected function duplicatePostData(array $postData)
    {
        $post = $postData['post'];
        $postName = $post['post_name'];
        $postTitle = $post['post_title'];
        $count = 0;

        $post['post_name'] = self::DUPLICATE_PREFIX . $postName;
        $post['post_title'] = self::DUPLICATE_PREFIX . $postTitle;
        while ($postId = $this->findPost($post)) {
            $count++;
            $post['post_name'] = self::DUPLICATE_PREFIX . "{$count}_{$postName}";
            $post['post_title'] = self::DUPLICATE_PREFIX . "{$count}_{$postTitle}";
        }

        $postData['post'] = $post;
        return $this->insertPostData($postData);
    }

    /**
     * Import attachment post with postmeta
     *
     * @param array $attachmentData
     * @return int|null
     */
    protected function importAttachmentData(array $attachmentData)
    {
        $attachment = $attachmentData['post'];

        if (isset($this->mappingAttachmentIds[$attachment['ID']])) {
            $this->response['skipped']['element'] += 1;
            return $this->mappingAttachmentIds[$attachment['ID']];
        }

        $attachmentId = $this->findPost($attachment);
        if (null === $attachmentId) {
            $newAttachmentId = $this->insertAttachmentData($attachmentData);
            $newAttachmentId && ($this->response['import']['element'] += 1);
        } elseif ($attachmentId && 1 == $this->duplicate) {
            $newAttachmentId = $this->duplicateAttachmentData($attachmentData);
            $newAttachmentId && ($this->response['duplicate']['element'] += 1);
        } else {
            $this->response['skipped']['element'] += 1;
            $newAttachmentId = null;
        }

        return $newAttachmentId;
    }

    /**
     * Insert attachment post with postmeta
     *
     * @param array $attachmentData
     * @return int|null
     */
    protected function insertAttachmentData(array $attachmentData)
    {
        $post = $attachmentData['post'];
        $oldPostId = $post['ID'];
        $postMeta = isset($attachmentData['postmeta']) ? $attachmentData['postmeta'] : array();
        $oldAttachmentFile = null;
        $newAttachmentFile = null;

        if (self::MODE_IMPORT_ZIP == $this->mode && isset($postMeta[self::POSTMETA_ATTACHED_FILE])) {
            $oldAttachmentFile = $postMeta[self::POSTMETA_ATTACHED_FILE];
           	$newAttachmentFile = $this->importFile($oldAttachmentFile);

            if (!$newAttachmentFile) {
                return null;
            }
        }

        unset($post['ID']);



        unset($post['guid']);
        $result = wp_insert_post($post, true);
        if (is_wp_error($result)) {
            $this->error = sprintf(
                __('Error insert post attachment with ID: "%d" and guid: "%s". %s'),
                $oldPostId,
                $post['guid'],
                $result->get_error_message()
            );
            return null;
        }
        $post['ID'] = $result;
        $this->mappingAttachmentIds[$oldPostId] = $post['ID'];

        if ($newAttachmentFile) {
            $postMeta[self::POSTMETA_ATTACHED_FILE] = str_replace(DIRECTORY_SEPARATOR, '/', $newAttachmentFile);
            $postMeta[self::POSTMETA_ATTACHMENT_METADATA] = serialize(wp_generate_attachment_metadata(
                $post['ID'],
                $this->baseFilePath . $newAttachmentFile
            ));
        }
        $this->addPostMeta($post['ID'], $postMeta);

        return $post['ID'];
    }

    /**
     * Duplicate attachment post with postmeta
     *
     * @param array $attachmentData
     * @return int|null
     */
    protected function duplicateAttachmentData(array $attachmentData)
    {
        $post = $attachmentData['post'];
        $postName = $post['post_name'];
        $postTitle = $post['post_title'];
        $count = 0;

        $post['post_name'] = self::DUPLICATE_PREFIX . $postName;
        $post['post_title'] = self::DUPLICATE_PREFIX . $postTitle;
        while ($post['ID'] = $this->findPost($post)) {
            $count++;
            $post['post_name'] = self::DUPLICATE_PREFIX . "{$count}_{$postName}";
            $post['post_title'] = self::DUPLICATE_PREFIX . "{$count}_{$postTitle}";
        }

        $attachmentData['post'] = $post;
        return $this->insertAttachmentData($attachmentData);
    }

    /**
     * Check whether correcting xml
     *
     * @param string $xml
     * @return bool
     */
    protected function validateXml($xml)
    {
        if (0 !== strpos($xml, self::XML_DECLARATION)) {
            $this->error = __('Invalid xml content.');
            return false;
        }
        return true;
    }

    /**
     * Convert xml element of post data to array
     *
     * @param SimpleXMLElement $postData
     * @return array
     */
    protected function convertPostData(SimpleXMLElement $postData)
    {
        $result = array();

        foreach ($postData->post[0] as $name => $value) {
            $result['post'][$name] = (string)$value;
        }

        if (isset($postData->postmeta)) {
            foreach ($postData->postmeta[0] as $name => $value) {
                $result['postmeta'][$name] = (string)$value;
            }
        }

        if (isset($postData->attachments)) {
            for ($i = 0, $count = count($postData->attachments->post_data); $i < $count; $i++ ) {
                $attachment = $postData->attachments->post_data[$i];
                $attachmentId = (string)$attachment->attributes()['id'];

                $result['attachments'][$attachmentId] = $this->convertPostData($attachment);
            }
        }

        return $result;
    }

    /**
     * Get post ID by post_name or post_title
     *
     * @param array $post
     * @return int|null
     */
    protected function findPost(array $post)
    {
        $query = $this->wpdb->prepare(
            'select ID from `' . $this->wpdb->prefix . 'posts`
            where post_type="%s" and post_status="%s" and (post_name="%s" or post_title="%s")',
            $post['post_type'],
            $post['post_status'],
            $post['post_name'],
            $post['post_title']
        );
        return $this->wpdb->get_var($query);
    }

    /**
     * Prepare and insert post
     *
     * @param array $post
     * @return int|null
     */
    protected function insertPost(array $post)
    {
        $oldPostId = $post['ID'];

        unset($post['ID']);
        unset($post['guid']);
        if (isset($this->mappingPostIds[$post['post_parent']])) {
            $post['post_parent'] = $this->mappingPostIds[$post['post_parent']];
        }

        $result = wp_insert_post($post, true);
        if (is_wp_error($result)) {
            $this->response['errors'][] = sprintf(
                __('Error insert post with ID: "%d" and title: "%s". %s'),
                $oldPostId,
                $post['post_title'],
                $result->get_error_message()
            );
            return null;
        }

        $this->mappingPostIds[$oldPostId] = $result;
        return $result;
    }

    /**
     * Add post meta values
     *
     * @param int $postId
     * @param array $postMeta
     * @return void
     */
    protected function addPostMeta($postId, array $postMeta)
    {
        foreach ($postMeta as $metaKey => $metaValue) {
            // check whether meta value is serialized
            $value = @unserialize($metaValue);
            if (false !== $value) {
                $metaValue = $value;
            }

            $result = add_post_meta($postId, $metaKey, $metaValue);
            if (false === $result) {
                $this->response['errors'][] = sprintf(
                    __('Error insert postmeta for post with ID %d. Meta key: "%s", meta value: "%s"'),
                    $postId,
                    $metaKey,
                    $metaValue
                );
                continue;
            }
        }
    }

    protected function readArchive($archivePath)
    {
        $archiveDir = dirname($archivePath) . DIRECTORY_SEPARATOR;
        $archiveName = basename($archivePath);
        $archives = array();

        if (preg_match('/^(.+)\.([0-9]+)\.zip$/', $archiveName, $match)) {
            $archiveRootName = $match[1];
            $archiveIndex = $match[2];

            $archiveChunkPath = "{$archiveDir}{$archiveRootName}.{$archiveIndex}.zip";
            while(file_exists($archiveChunkPath)) {
                $archives[] = $archiveChunkPath;
                $archiveIndex++;
                $archiveChunkPath = "{$archiveDir}{$archiveRootName}.{$archiveIndex}.zip";
            }
        } else {
            $archives[] = $archivePath;
        }

        foreach ($archives as $index => $archive) {
            $this->readSingleArchive("archive-{$index}",  $archive);
            if ($this->error) {
                break;
            }
        }

        return $this->error ? false : true;
    }

    /**
     * Read list files from single archive
     *
     * @param string $key
     * @param string $path
     * @return bool
     */
    protected function readSingleArchive($key, $path)
    {
        $zip = new ZipArchive();

        if(true !== $zip->open($path)) {
            $this->error = sprintf(__("Can't open archive \"%s\"."), basename($path));
            return false;
        }
        $this->archives[$key] = $zip;

        for ($i = 0; $i < $zip->numFiles; $i++) {
            $stat = $zip->statIndex($i);
            $this->archiveFiles[$stat['name']] = $key;
        }

        return true;
    }

    /**
     * Import single file from archive to upload directory
     *
     * @param string $file
     * @return bool|string
     */
    protected function importFile($file)
    {
        if (!isset($this->archiveFiles[$file])) {
            $this->error = sprintf(__("Can't import file \"%s\". File is absent in archive"), $file);
            return false;
        }

        $archiveKey = $this->archiveFiles[$file];
        $archive = $this->archives[$archiveKey];
        $uploadDir = dirname($file) . DIRECTORY_SEPARATOR;
        $fileName = basename($file);
        $filePath = $this->baseFilePath . $uploadDir . $fileName;

        if (file_exists($filePath) && 0 == $this->duplicate) {
            $this->response['skipped']['file'] += 1;
            return $file;
        }
        if (file_exists($filePath) && 1 == $this->duplicate) {
            $count = 0;
            $duplicateFileName = self::DUPLICATE_PREFIX . $fileName;
            $duplicateFilePath = $this->baseFilePath . $uploadDir . $fileName;
            while (file_exists($duplicateFilePath)) {
                $count++;
                $duplicateFileName = self::DUPLICATE_PREFIX . "{$count}_{$fileName}";
                $duplicateFilePath = $this->baseFilePath . $uploadDir . $duplicateFileName;
            }

            $fileName = $duplicateFileName;
            $filePath = $duplicateFilePath;
            $this->response['duplicate']['file'] += 1;
        } else {
            $this->response['import']['file'] += 1;
        }

        if (!file_exists($this->baseFilePath . $uploadDir) && mkdir($this->baseFilePath . $uploadDir, 0777, true)) {
            $this->error = sprintf(__("Can't create directory \"%s\" during import file."), $this->baseFilePath . $uploadDir);
            return false;
        }
        if (!touch($filePath) || !chmod($filePath, 0777)) {
            $this->error = sprintf(__("Can't create file \"%s\" during import file."), $file);
            return false;
        }
        file_put_contents($filePath, $archive->getFromName($file));

        return $uploadDir . $fileName;
    }
}
