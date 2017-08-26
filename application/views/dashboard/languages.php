<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Manage Languages</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="">
                    <a data-toggle="modal" data-target="#add_language_modal" href="javascript:void(0);" class="btn btn-primary">Add New Language</a>
                </div>

                <table class="table table-striped table-bordered table-hover" id="editable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Language</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Language</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
    </div>
</div>
<input type="hidden" id="languages_data" value='<?php echo json_encode($languages_data); ?>' />

<!-- Delete Language Modal -->
<div class="modal fade" id="delete_language_madal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <h4 class="modal-title">Confirm</h4>
            </div>
            <div class="modal-body">
                <strong>Are you sure want to delete this Language ??</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" id="" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Add new language Modal -->
<div class="modal fade" id="add_language_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <form class="form-horizontal" id="form_add_lang">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Language</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group hide-form">
                        <div class="col-lg-10">
                            <input type="text" placeholder="Lauguage" id="language" class="form-control" required />
                        </div>
                    </div>
                    <div class="ajax-loader sk-spinner sk-spinner-rotating-plane"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>