<div class="row">
    <div class="col-md-12">
        <div id="content">



            <div id="pimCsvImport" class="box">

                <div class="head">
                    <h1 id="pimCsvImportHeading">CSV Data Import</h1>
                </div>

                <div class="inner">





                    <form name="frmPimCsvImport" id="frmPimCsvImport" method="post" action="/hrm/symfony/web/index.php/admin/pimCsvImport" enctype="multipart/form-data" novalidate="novalidate">

                        <input type="hidden" name="pimCsvImport[_csrf_token]" value="f8b631a40fa174c867c361276f1c0808" id="pimCsvImport__csrf_token">
                        <fieldset>

                            <ol class="normal">

                                <li class="fieldHelpContainer">
                                    <label for="pimCsvImport_csvFile">Select File <em>*</em></label>                        <input type="file" name="pimCsvImport[csvFile]" id="pimCsvImport_csvFile">                        <label class="fieldHelpBottom">Accepts up to 1MB</label>
                                </li>

                            </ol>

                            <ul class="disc">
                                <li>
                                    Column order should not be changed                    </li>
                                <li>
                                    First Name and Last Name are compulsory                    </li>
                                <li>
                                    All date fields should be in YYYY-MM-DD format                    </li>
                                <li>
                                    If gender is specified, value should be either <span class="boldText">Male</span> or <span class="boldText">Female</span>                    </li>
                                <li>
                                    Each import file should be configured for 100 records or less                    </li>
                                <li>
                                    Multiple import files may be required                    </li>
                                <li>Sample CSV file:                         <a title="Download" target="_blank" class="download" href="/hrm/symfony/web/index.php/admin/sampleCsvDownload">Download</a>
                                </li>
                            </ul>

                            <ol>
                                <li class="required">
                                    <em>*</em> Required field                    </li>
                            </ol>

                            <p>
                                <input type="button" class="" name="btnSave" id="btnSave" value="Upload">
                            </p>

                        </fieldset>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>