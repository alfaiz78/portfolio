<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php if (isset($service)): ?>
                                Edit Service
                            <?php else: ?>
                                Add Service
                            <?php endif; ?>
                        </h5>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?= base_url('service/save_service') ?>"
                            enctype="multipart/form-data">
                            <!-- <input type="hidden" name="id" value="<= isset($service) ? $service->id : ''; ?>"> -->
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="text" name="icon" class="form-control"
                                    value="<?= isset($service) ? $service->icon : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="<?= isset($service) ? $service->title : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control"
                                    required><?= isset($service) ? $service->description : ''; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <?= isset($service) ? 'Update Service' : 'Add Service'; ?>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Existing service List -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-4">Existing services</h2>
                        <div class="col-lg-12 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">services List</h5>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>S.no</th>
                                                    <th>Icon</th>
                                                    <th>Title</th>

                                                    <th>Description</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($services)): ?>
                                                    <?php $counter = 1; // Initialize counter ?>
                                                    <?php foreach ($services as $service): ?>
                                                        <tr>
                                                            <td><?= $counter++; ?></td>
                                                            <td><?= $service->icon; ?></td>
                                                            <td><?= $service->title; ?></td>

                                                            <td><?= $service->description; ?></td>
                                                            <td>
                                                                <a href="<?= base_url('service/manage_services/' . $service->id); ?>"
                                                                    class="btn btn-primary">Edit</a>

                                                                <a href="#" class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#deleteModal<?php echo $service->id; ?>">Delete</a>
                                                            </td>
                                                        </tr>
                                                        <!-- Modal for Deleting Service -->
                                                        <div class="modal fade custom-modal"
                                                            id="deleteModal<?php echo $service->id; ?>" tabindex="-1"
                                                            role="dialog"
                                                            aria-labelledby="deleteModalLabel<?php echo $service->id; ?>"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content custom-modal-content">
                                                                    <div class="modal-header custom-modal-header">
                                                                        <h5 class="modal-title custom-modal-title"
                                                                            id="deleteModalLabel<?php echo $service->id; ?>">
                                                                            Delete Service
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body custom-modal-body text-danger">
                                                                        Are you sure you want to delete this service?
                                                                    </div>
                                                                    <div class="modal-footer custom-modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary custom-btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <a href="<?php echo base_url('service/delete_service/' . $service->id); ?>"
                                                                            class="btn btn-danger custom-btn-danger">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">No service found.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>