<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12"> <!-- Added a column to properly structure the layout -->
                <!-- Slider Form (Add/Edit) -->
                <div class="mb-4">
                    <h1 class="text-center mb-4">Manage Sliders</h1>

                    <!-- Form to Add/Edit Slider -->
                    <form action="<?php echo site_url('slider/save_slider'); ?>" method="POST" enctype="multipart/form-data" class="mb-4">
                        <!-- <input type="hidden" name="id" value="<php echo isset($slider) ? $slider->id : ''; ?>"> -->
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" value="<?php echo isset($slider) ? $slider->title : ''; ?>" required>
                            <?php echo form_error('title'); ?>
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Subtitle:</label>
                            <input type="text" class="form-control" name="subtitle" value="<?php echo isset($slider) ? $slider->subtitle : ''; ?>" required>
                            <?php echo form_error('subtitle'); ?>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" required><?php echo isset($slider) ? $slider->description : ''; ?></textarea>
                            <?php echo form_error('description'); ?>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Slider</button>
                    </form>

                    <h2 class="mb-4">Existing Sliders</h2>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
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
                                    <td><?php echo $slider->title; ?></td>
                                    <td><?php echo $slider->subtitle; ?></td>
                                    <td><?php echo $slider->description; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('slider/manage_sliders/' . $slider->id); ?>" class="btn btn-warning">Edit</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal<?php echo $slider->id; ?>">Delete</a>
                                    </td>
                                </tr>
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
                                <td colspan="4" class="text-center">No sliders found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                </div>

                <!-- Table to Display Existing Sliders -->

            </div>
        </div>
    </div>
</div>
