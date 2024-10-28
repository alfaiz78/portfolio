<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <!-- Slider Form (Add/Edit) -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
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

                            <?php if (isset($slider)): ?>
                                Edit Slider
                            <?php else: ?>
                                Add Slider
                            <?php endif; ?>
                        </h5>
                        <form method="post" action="<?php echo base_url('slider/save_slider'); ?>" enctype="multipart/form-data">
                            <!-- <input type="hidden" name="id" value="<php echo isset($slider) ? $slider->id : ''; ?>"> -->
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />


                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="<?php echo isset($slider) ? $slider->title : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" class="form-control" name="subtitle" value="<?php echo isset($slider) ? $slider->subtitle : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" required><?php echo isset($slider) ? $slider->description : ''; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image">
                                <?php if (isset($slider)): ?>
                                    <img src="<?php echo base_url('assets/uploads/sliders/' . $slider->image); ?>" width="100">
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <?php echo isset($slider) ? 'Update' : 'Add'; ?> Slider
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sliders List -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sliders List</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($sliders)): ?>
                                        <?php foreach ($sliders as $slider): ?>
                                            <tr>
                                                <td><img src="<?php echo base_url('assets/uploads/sliders/' . $slider->image); ?>" width="100"></td>
                                                <td><?php echo $slider->title; ?></td>
                                                <td><?php echo $slider->subtitle; ?></td>
                                                <td><?php echo $slider->description; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('slider/manage_sliders/' . $slider->id); ?>" class="btn btn-primary">Edit</a>
                                                    
                                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal<?php echo $slider->id; ?>">Delete</a>
                                                </td>
                                            </tr>
                                            <!-- delete function -->
                                            <div class="modal fade custom-modal"
                                                id="deleteModal<?php echo $slider->id; ?>" tabindex="-1"
                                                role="dialog"
                                                aria-labelledby="deleteModalLabel<?php echo $slider->id; ?>"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content custom-modal-content">
                                                        <div class="modal-header custom-modal-header">
                                                            <h5 class="modal-title custom-modal-title"
                                                                id="deleteModalLabel<?php echo $slider->id; ?>">
                                                                Delete slider
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body custom-modal-body text-danger">
                                                            Are you sure you want to delete this Slider?
                                                        </div>
                                                        <div class="modal-footer custom-modal-footer">
                                                            <button type="button"
                                                                class="btn btn-secondary custom-btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <a href="<?php echo base_url('slider/delete_slider/' . $slider->id); ?>"
                                                                class="btn btn-danger custom-btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No sliders found.</td>
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