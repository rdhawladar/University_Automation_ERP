<?php
/*
*      Robo Gallery     
*      Version: 1.0
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/

class ROBO_GALLERY_CATEGORY
{
    /**
     * Post type
     *
     * @var string
     */
    protected $postType;

    /**
     * Parameters of creating post type
     *
     * @var array
     */
    protected $postTypeParams;

    /**
     * Assets directory uri
     *
     * @var string
     */
    protected $assetsUri;

    /**
     * Current post menu_order value during save posts hierarchy
     *
     * @var int
     */
    protected $currentPostOrder;

    /**
     * @constructor
     * @param string $postType
     * @param array $postTypeParams
     */
    public function __construct($postType) //, array $postTypeParams
    {
        $this->postType = $postType;
        $this->postTypeParams = array();
        //$this->postTypeParams = $postTypeParams;
        $this->assetsUri = plugin_dir_url(__FILE__);

        add_action('add_meta_boxes', array($this, 'addMetaBox'));
        add_action('admin_enqueue_scripts', array($this, 'enqueueScripts'));
        add_action("wp_ajax_hierarchy_{$this->postType}_meta_box", array($this, 'ajaxMetaBoxAttributes'));
        add_action("wp_ajax_hierarchy_{$this->postType}_dialog", array($this, 'ajaxDialog'));
        add_action("wp_ajax_hierarchy_{$this->postType}_dialog_save", array($this, 'ajaxDialogSave'));
    }


    /**
     * Register post type
     *
     * @return object|WP_Error
     */
    protected function registerPostType()
    {
        $params = array_merge(
            $this->postTypeParams,
            array('hierarchical' => true)
        );

        return register_post_type($this->postType, $params);
    }

    /**
     * Add "Attributes" meta box for editing hierarchy
     *
     * @return void
     */
    public function addMetaBox()
    {
        add_meta_box(
            'hierarchy-post-attributes-metabox',
            '<span class="dashicons dashicons-feedback"></span> '.__('Categories'),
            array($this, 'metaBoxAttributes'),
            $this->postType,
            'side',
            'core'
        );
    }

    /**
     * Add styles and scripts
     *
     * @return void
     */
    public function enqueueScripts()
    { 

        $screen = get_current_screen();
        if ($this->postType !== $screen->post_type) {

            return;
        }

        wp_enqueue_style('wp-jquery-ui-dialog');
        wp_enqueue_style(
            'hierarchy-post-attributes-style',
            $this->assetsUri . '/css/style.css',
            array('wp-jquery-ui-dialog')
        );

        wp_enqueue_script('jquery-ui-dialog');
        wp_enqueue_script(
            'hierarchy-post-attributes-nestable-js',
            $this->assetsUri . '/js/jquery.nestable.js',
            array('jquery-ui-dialog'),
            false,
            true
        );
        wp_enqueue_script(
            'hierarchy-post-attributes-js',
            $this->assetsUri . '/js/script.js',
            array('jquery-ui-dialog', 'hierarchy-post-attributes-nestable-js'),
            false,
            true
        );

        $postTypeObject = get_post_type_object($this->postType);
       wp_localize_script(
            'hierarchy-post-attributes-js',
            'hierarchyPostAttributes',
            array(
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'metaBox' => array(
                    'action' => array(
                        'get' => "hierarchy_{$this->postType}_meta_box"
                    )
                ),
                'dialog' => array(
                    'title' => __(sprintf('Edit hierarchy of %s', $postTypeObject->labels->name)),
                    'button' => array(
                        'save' => array(
                            'label' => __('Save')
                        ),
                        'cancel' => array(
                            'label' => __('Cancel')
                        )
                    ),
                    'action' => array(
                        'get' => "hierarchy_{$this->postType}_dialog",
                        'save' => "hierarchy_{$this->postType}_dialog_save",
                    ),
                ),
                'error' => array(
                    'title' => __('Error'),
                    'button' => array(
                        'ok' => array(
                            'label' => __('OK')
                        ),
                    )
                )
            )
        );
    }

    /**
     * Display meta box "Attributes"
     *
     * @param WP_Post $post
     * @return void
     */
    public function metaBoxAttributes(WP_Post $post)
    {
        $postTypeObject = get_post_type_object($post->post_type);
        $screen = get_current_screen();

        if (!$postTypeObject->hierarchical) {
            return;
        }
        if ($screen && 'add' === $screen->action) {
            return;
        }

                $path = array(get_the_title($post));
		        $parent = $post->post_parent ? get_post($post->post_parent) : null;
		        $directParentId = ($parent && 'publish' == $parent->post_status) ? $parent->ID : 0;
		        while($parent && 'publish' == $parent->post_status) {
		            $path[] = get_the_title($parent) . ' >>';
		            $parent = $parent->post_parent ? get_post($parent->post_parent) : null;
		        }
		        $path[] = __('Root Category', 'rbs_gallery').' >>';
		        $path = array_reverse($path);
		        ?>
            <input type="hidden" name="parent_id" value="<?php echo $directParentId; ?>">

            <?php foreach ($path as $index => $postTitle) : ?>
                <p><?php echo str_repeat('&nbsp;', $index * 4); ?><?php echo esc_attr($postTitle); ?></p>
            <?php endforeach; ?>
            <div class="actions">
                <button class="button edit" type="button"
                        data-post_id="<?php echo $post->ID; ?>"
                        data-post_type="<?php echo $post->post_type; ?>">
                    <?php echo __('Edit'); ?>
                </button>
            </div>
        <?php
    }

    /**
     * Get content of meta box "Attributes" via Ajax
     *
     * @return void
     */
    public function ajaxMetaBoxAttributes()
    {
        $this->checkPermission();

        if (!isset($_POST['post_id'])) {
            header('HTTP/1.0 403 Forbidden');
            echo __('Post ID is absent in request');
            die();
        }

        $postId = absint($_POST['post_id']);
        $post  = get_post($postId);
        if (!$post) {
            header('HTTP/1.0 403 Forbidden');
            echo __(sprintf('Can not find post with ID "%d"', $postId));
            die();
        }

        $this->metaBoxAttributes($post);
        die();
    }

    /**
     * Get content of dialog for editing posts hierarchy via Ajax
     *
     * @return void
     */
    public function ajaxDialog() {
        $this->checkPermission();

        if (!isset($_POST['post_type'])) {
            header('HTTP/1.0 403 Forbidden');
            echo __('Post type is absent in request');
            die();
        }

        $postType = $_POST['post_type'];
        if (!post_type_exists($postType)) {
            header('HTTP/1.0 403 Forbidden');
            echo __(sprintf('Post type "%s" is not registered', htmlentities($postType)));
            die();
        }

        $postTree = $this->getPostTree($postType);
        ?>
            <div class="nestable-list dd">
                <?php $this->theNestableList($postTree); ?>
            </div>
            <div class="nestable-list-spinner">
                <img src="<?php echo admin_url('/images/spinner-2x.gif') ?>" />
            </div>
        <?php

        wp_die();
    }

    /**
     * Save posts hierarchy via Ajax
     *
     * @return void
     */
    public function ajaxDialogSave() {
        $this->checkPermission();

        if (!isset($_POST['hierarchy_posts'])) {
            header('HTTP/1.0 403 Forbidden');
            echo __('Empty posts hierarchy data for saving');
            die();
        }
        if (!is_array($_POST['hierarchy_posts'])) {
            header('HTTP/1.0 403 Forbidden');
            echo __('Wrong posts hierarchy data for saving');
            die();
        }

        $hierarchyPosts = $_POST['hierarchy_posts'];
        $this->currentPostOrder = 0;
        foreach ($hierarchyPosts as $order => $postData) {
            $this->updatePostHierarchy($postData);
        }
    }

    /**
     * Get posts hierarchy tree
     *
     * @param string $postType
     * @return array
     */
    protected function getPostTree($postType)
    {
        $args = array(
            'post_type' => $postType,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        $postMap = array();
        $postTree = array();

        foreach (get_posts($args) as $post) {
            if (isset($postMap[$post->ID])) {
                $postMap[$post->ID]['post'] = $post;
                $postData = &$postMap[$post->ID];
            } else {
                $postData = array('post' => $post, 'children' => array());
                $postMap[$post->ID] = &$postData;
            }
            if (0 == $post->post_parent) {
                $postTree["{$post->menu_order}-{$post->ID}"] = &$postData;
            } else {
                $postMap[$post->post_parent]['children'][$post->ID] = &$postData;
            }
            unset($postData);
        }
        
        // Adding children posts with lost parent to tree
        foreach ($postMap as &$postData) {
            if (!isset($postData['post']) && is_array($postData['children'])) {
                foreach ($postData['children'] as &$childPostData) {
                    $childPost = $childPostData['post'];
                    $postTree["{$childPost->menu_order}-{$childPost->ID}"] = &$childPostData;
                }
            }
        }
        asort($postTree);

        return $postTree;
    }

    /**
     * Display nestable list
     *
     * @param array $tree
     * @return void
     */
    protected function theNestableList(array $tree)
    {
        ?>
            <ol class="dd-list">
            <?php foreach ($tree as $item) : ?>
                <li class="dd-item" data-id="<?php echo $item['post']->ID; ?>">
                    <div class="dd-handle">
                        <?php 
                        $title = esc_attr($item['post']->post_title);
                        echo "{$title} [{$item['post']->ID}: {$item['post']->post_name}]" ; ?>
                    </div>
                    <?php if (!empty($item['children'])) : ?>
                        <?php $this->theNestableList($item['children']); ?>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
            </ol>
        <?php
    }

    /**
     * Check whether user can edit posts
     *
     * @return void
     */
    protected function checkPermission()
    {
        $postTypeObject = get_post_type_object($this->postType);
        if (!current_user_can($postTypeObject->cap->edit_posts)) {
            header('HTTP/1.0 403 Forbidden');
            echo __(sprintf("You don't have permission for editing this %s", $postTypeObject->labels->name));
            die();
        }
    }

    /**
     * Update post hierarchy
     *
     * @param array $postData
     * @param int $parentId
     * @return void
     */
    protected function updatePostHierarchy($postData, $parentId = 0)
    {
        $this->currentPostOrder++;
        wp_update_post(array(
            'ID' => absint($postData['id']),
            'post_parent' => absint($parentId),
            'menu_order' => $this->currentPostOrder
        ));

        if (!empty($postData['children'])) {
            foreach ($postData['children'] as $childPostData) {
                $this->updatePostHierarchy($childPostData, $postData['id']);
            }
        }
    }
}
