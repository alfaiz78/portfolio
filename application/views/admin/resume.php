<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Flash Messages for Success and Error -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <div class="row mt-3">
            <!-- Hadding Resume Section -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Heading Resume</h5>
                        <?php foreach ($hresumes as $resume): ?>
                            <form method="post" action="<?php echo base_url('resume/update_resume'); ?>"
                                enctype="multipart/form-data">
                                <!-- <input type="hidden" name="id" value="<?php echo isset($resume) ? $resume->id : ''; ?>"> -->
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                                <div class="form-group">
                                    <label for="Year">Title</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('title') ? 'is-invalid' : ''; ?>"
                                        name="title"
                                        value="<?php echo isset($resume) ? $resume->title : set_value('title'); ?>"
                                        placeholder="Enter title" required>
                                    <div class="invalid-feedback"><?php echo form_error('title'); ?></div>
                                </div>

                                <div class="form-group">
                                    <label for="Work">Background Title</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('bg_title') ? 'is-invalid' : ''; ?>"
                                        name="bg_title"
                                        value="<?php echo isset($resume) ? $resume->bg_title : set_value('bg_title'); ?>"
                                        placeholder="Enter background title" required>
                                    <div class="invalid-feedback"><?php echo form_error('bg_title'); ?></div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description"
                                        required><?php echo isset($resume) ? $resume->description : ''; ?></textarea>
                                    <div class="invalid-feedback"><?php echo form_error('description'); ?></div>
                                </div>

                                <button type="submit"
                                    class="btn btn-primary"><?php echo isset($resume) ? 'Update Hadding' : 'Add Resume'; ?></button>

                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Add Resume Section -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Resume</h5>
                        <form method="post" action="<?php echo base_url('resume/add'); ?>"
                            enctype="multipart/form-data">
                            <!-- <input type="hidden" name="id" value="<php echo isset($resume) ? $resume->id : ''; ?>"> -->
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                            <div class="form-group">
                                <label for="Year">Year</label>
                                <input type="text"
                                    class="form-control <?php echo form_error('year') ? 'is-invalid' : ''; ?>"
                                    name="year" value="" placeholder="Enter year" required>

                            </div>

                            <div class="form-group">
                                <label for="Work">Work</label>
                                <input type="text"
                                    class="form-control <?php echo form_error('work') ? 'is-invalid' : ''; ?>"
                                    name="work" value="" placeholder="Enter work experience" required>

                            </div>

                            <div class="form-group">
                                <label for="University_name">University Name</label>
                                <input type="text"
                                    class="form-control <?php echo form_error('university_name') ? 'is-invalid' : ''; ?>"
                                    name="university_name" value="" placeholder="Enter university name" required>

                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" placeholder="Enter description"
                                    required></textarea>

                            </div>
                            <button type="submit" class="btn btn-primary">
                                <?php echo isset($slider) ? 'Update' : 'Add'; ?> RESUME
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Resume List -->
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Resume List</h5>
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
                                        <?php $counter = 1; ?>
                                        <?php foreach ($resumes as $resume): ?>
                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td><?php echo $resume->year; ?></td>
                                                <td><?php echo $resume->u_name; ?></td>
                                                <td><?php echo $resume->work; ?></td>
                                                <td><?php echo $resume->description; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('resume/manage_resumes/' . $resume->id); ?>"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal<?php echo $resume->id; ?>">Delete</a>
                                                </td>
                                            </tr>

                                            <!-- Delete Confirmation Modal -->

                                            <!-- Modal for Deleting Resume -->
                                            <div class="modal fade custom-modal" id="deleteModal<?php echo $resume->id; ?>"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="deleteModalLabel<?php echo $resume->id; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content custom-modal-content">
                                                        <div class="modal-header custom-modal-header">
                                                            <h5 class="modal-title custom-modal-title"
                                                                id="deleteModalLabel<?php echo $resume->id; ?>">Delete Resume
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
                                                            <button type="button" class="btn btn-secondary custom-btn-secondary"
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