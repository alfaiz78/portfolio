
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mt-3">
            <!-- About Form (Add/Edit) -->
            <div class="col-lg-12">
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
                        </h5>

                        <!-- Start of the form -->
                        <form method="post" action="<?php echo base_url('about/update_about'); ?>" enctype="multipart/form-data">
                        <?php if (!empty($abouts)): ?>
                            <?php foreach ($abouts as $about): ?>


                        <input type="hidden" name="id" value="<?php echo isset($about) ? $about->id : ''; ?>">


    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="Atitle" value="<?php echo $about->title; ?>" required>
    </div>

    <div class="form-group">
        <label for="bg_title">Background Title</label>
        <input type="text" class="form-control" name="bg_title" value="<?php echo set_value('bg_title', isset($about) ? $about->bg_title : ''); ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" required><?php echo set_value('description', isset($about) ? $about->description : ''); ?></textarea>
    </div>
    <?php echo form_open_multipart('assets/uploads/do_upload');?>

    <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" name="image" <?php echo isset($about) ? '' : 'required'; ?>>
    <?php if (isset($about) && $about->image): ?>
        <img src="<?php echo base_url('/assets/uploads/abouts/' . $about->image); ?>" width="100">
        <input type="hidden" name="existing_image" value="<?php echo $about->image; ?>">
    <?php endif; ?>
</div>

<div class="form-group">
    <label for="cv">Upload CV</label>
    <input type="file" class="form-control" name="cv" <?php echo isset($about) ? '' : 'required'; ?>>
    <?php if (isset($about) && $about->cv): ?>
        <p>Existing CV: <?php echo $about->cv; ?></p>
        <input type="hidden" name="existing_cv" value="<?php echo $about->cv; ?>">
    <?php endif; ?>
</div>



    <!-- Additional headings and titles -->
    <table>
    <?php for ($i = 1; $i <= 6; $i++): ?>
        <tr>
            <td>
                <div class="form-group">
                    <label for="heading[<?= $i ?>]">Heading <?= $i ?></label>
                    <input type="text" class="form-control" name="heading<?= $i ?>" value="<?php echo set_value("heading[$i]", isset($about) ? $about->{"heading$i"} : ''); ?>">
                </div>
            </td>

            <td>
                <div class="form-group">
                    <label for="title[<?= $i ?>]">Title <?= $i ?></label>
                    <input type="text" class="form-control" name="title<?= $i ?>" value="<?php echo set_value("title[$i]", isset($about) ? $about->{"title$i"} : ''); ?>">
                </div>
            </td>
        </tr>
    <?php endfor; ?>
</table>


    
    </table>

    <div class="form-group">
    <label for="subtitle">Subtitle</label>
    <input type="text" class="form-control" name="subtitle" value="<?php echo isset($about) ? $about->subtitle : ''; ?>" required>
        
    <label for="subdigit">subdigit</label>
    <input type="number" class="form-control" name="subdigit" value="<?php echo isset($about) ? $about->subdigit : ''; ?>" required>

</div>
<?php endforeach; ?>
<?php else: ?>
    <p>No About data found.</p>
<?php endif; ?>


    <button type="submit" class="btn btn-primary"><?php echo isset($about) ? 'Update' : 'Add'; ?> About</button>
</form>

        </div>
    </div>
</div>


