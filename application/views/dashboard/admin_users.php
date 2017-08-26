<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Manage Administrators</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="">
                    <a id="add_admin_button" href="<?php echo site_url('dashboard/add_admin'); ?>" class="btn btn-primary">Add New Administrator</a>
                </div>

                <table class="table table-striped table-bordered table-hover dataTable-admin" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>VID</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>VID</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
    </div>
</div>

<!-- Delete User Modal -->
<div class="modal fade" id="delete_admin_madal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <h4 class="modal-title">Confirm</h4>
            </div>
            <div class="modal-body">
                <strong>Are you sure want to delete this Administrator ??</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" id="" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>