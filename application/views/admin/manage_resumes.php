<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php if (isset($resume)): ?>
                                Edit Resume
                            <?php else: ?>
                                Add Resume
                            <?php endif; ?>
                        </h5>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?= base_url('resume/save_resume'); ?>"
                            enctype="multipart/form-data">
                            <!-- <input type="hidden" name="id" value="<= isset($resume) ? $resume->id : ''; ?>"> -->
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />


                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="text" name="year" class="form-control"
                                    value="<?= isset($resume) ? $resume->year : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="work">Work</label>
                                <input type="text" name="work" class="form-control"
                                    value="<?= isset($resume) ? $resume->work : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="university_name">University Name</label>
                                <input type="text" name="university_name" class="form-control"
                                    value="<?= isset($resume) ? $resume->u_name : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control"
                                    required><?= isset($resume) ? $resume->description : ''; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <?= isset($resume) ? 'Update Resume' : 'Add Resume'; ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Existing resumes List -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-4">Existing resumes</h2>
                        <div class="col-lg-12 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">resumes List</h5>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>S.no</th>
                                                    <th>Year</th>
                                                    <th>University Name</th>
                                                    <th>Work</th>
                                                    <th>Description</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($resumes)): ?>
                                                    <?php $counter = 1; // Initialize counter ?>
                                                    <?php foreach ($resumes as $resume): ?>
                                                        <tr>
                                                            <td><?= $counter++; ?></td>
                                                            <td><?= $resume->year; ?></td>
                                                            <td><?= $resume->u_name; ?></td>
                                                            <td><?= $resume->work; ?></td>
                                                            <td><?= $resume->description; ?></td>
                                                            <td>
                                                                <a href="<?= base_url('resume/manage_resumes/' . $resume->id); ?>"
                                                                    class="btn btn-primary">Edit</a>

                                                                <a href="#" class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#deleteModal<?php echo $resume->id; ?>">Delete</a>
                                                            </td>
                                                        </tr>
                                                        <!-- Modal for Deleting Resume -->
                                                        <div class="modal fade custom-modal"
                                                            id="deleteModal<?php echo $resume->id; ?>" tabindex="-1"
                                                            role="dialog"
                                                            aria-labelledby="deleteModalLabel<?php echo $resume->id; ?>"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content custom-modal-content">
                                                                    <div class="modal-header custom-modal-header">
                                                                        <h5 class="modal-title custom-modal-title"
                                                                            id="deleteModalLabel<?php echo $resume->id; ?>">
                                                                            Delete Resume
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body custom-modal-body text-danger">
                                                                        Are you sure you want to delete this resume?
                                                                    </div>
                                                                    <div class="modal-footer custom-modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary custom-btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <a href="<?php echo base_url('resume/delete_resume/' . $resume->id); ?>"
                                                                            class="btn btn-danger custom-btn-danger">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">No resume found.</td>
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