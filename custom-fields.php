<?php
foreach ($edit_fields as $key => $field) {
	switch ($field['type']) {
        case 'text':?>
            <?php if(isset($field['extra']['wrapper'])){ ?>
                <div class="<?php echo $field['extra']['wrapper'];?>">
            <?php }else{?>
                <div class="col-xs-12">
            <?php }?>

                <div class="form-group">
                    <!--start label-->
                    <?php if(isset($field['label'])){ ?><label><?php echo $field['label'];?></label><?php }?>
                    <!--end label-->

    				<?php if(isset($field['extra']['not_editable'])){ ?>
    						<div><?php if(isset($item[$key])) echo $item[$key];?></div>
    				<?php }else{?>
                            <!--start input-->
                    		<input
                                type="<?php echo $field['type'];?>"
                                id="<?php echo isset($field['id']) ? $field['id'] : '';?>"
                                <?php echo (isset($field['disabled']) && $field['disabled']) ? 'disabled="disabled"' : '';?>
                                class="form-control <?php echo isset($field['class']) ? $field['class'] : '';?>"
                                <?php if(isset($field['extra']['data']['format'])) { echo 'data-format="'.$field['extra']['data']['format'].'"';}?>
                                name="<?php echo $key;?>"
                                value="<?php if(isset($item[$key])) {echo $item[$key];}elseif(isset($field['default'])){ echo $field['default'];}?>">
                            <!--end input-->
    				<?php }?>

                    <!--start notes-->
                    <?php if(isset($field['notes'])){ ?><p class="help-block"><?php echo $field['notes'];?></p><?php }?>
                    <!--end notes-->

                </div>
            </div>
        <?php break;

        case 'password':?>
            <?php if(isset($field['extra']['wrapper'])){ ?>
                <div class="<?php echo $field['extra']['wrapper'];?>">
            <?php }else{?>
                <div class="col-xs-12">
            <?php }?>

                <div class="form-group">
                    <!--start label-->
                    <?php if(isset($field['label'])){ ?><label><?php echo $field['label'];?></label><?php }?>
                    <!--end label-->

                    <!--start input-->
                    <input
                        type="<?php echo $field['type'];?>"
                        id="<?php echo isset($field['id']) ? $field['id'] : '';?>"
                        <?php echo (isset($field['disabled']) && $field['disabled']) ? 'disabled="disabled"' : '';?>
                        class="form-control"
                        name="<?php echo $key;?>"
                        value="">
                    <!--end input-->

                    <!--start notes-->
                    <?php if(isset($field['notes'])){ ?><p class="help-block"><?php echo $field['notes'];?></p><?php }?>
                    <!--end notes-->
                </div>
            </div>
        <?php break;
        case 'file':?>
            <?php if(isset($field['extra']['wrapper'])){ ?>
                <div class="<?php echo $field['extra']['wrapper'];?>">
            <?php }else{?>
                <div class="col-xs-12">
            <?php }?>

                <div class="form-group">
                    <!--start label-->
                    <?php if(isset($field['label'])){ ?><label><?php echo $field['label'];?></label><?php }?>
                    <!--end label-->

                    <!--start input-->
                    <input
                        type="<?php echo $field['type'];?>"
                        id="<?php echo isset($field['id']) ? $field['id'] : '';?>"
                        <?php echo (isset($field['disabled']) && $field['disabled']) ? 'disabled="disabled"' : '';?>
                        name="<?php echo $key;?>">
                    <!--end input-->
                    <?php if (isset($item[$key]) && $item[$key] != "") { ?>
                        <a href="<?php echo site_url($upload_path . $item[$key]); ?>" target="_blank"><img src="<?php echo site_url($upload_path . $item[$key]); ?>" width="200"></a>
                        <a href="<?php echo site_url($module_url . 'delete_image/' . $item['id'] .'/'. $field['extra']['link_argument']); ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                    <?php } ?>

                    <!--start notes-->
                    <?php if(isset($field['notes'])){ ?><p class="help-block"><?php echo $field['notes'];?></p><?php }?>
                    <!--end notes-->
                </div>
            </div>
        <?php break;
        case 'radio':?>
            <?php if(isset($field['extra']['wrapper'])){ ?>
                <div class="<?php echo $field['extra']['wrapper'];?>">
            <?php }else{?>
                <div class="col-xs-12">
            <?php }?>

                <div class="radio">
    				<!--start label-->
                    <?php if(isset($field['label'])){ ?><div><strong><?php echo $field['label'];?></strong></div><?php }?>
                    <!--end label-->

                    <?php foreach ($field['default'] as $ov => $ol): ?>
                        <label>
                            <!--start input-->
                            <input
                            type="<?php echo $field['type'];?>"
                            name="<?php echo $key;?>"
                            <?php echo (isset($field['disabled']) && $field['disabled']) ? 'disabled="disabled"' : '';?>
                            value="<?php echo $ov;?>"
                            <?php if(isset($item[$key]) && $item[$key] == $ov){ echo " checked=\"checked\" ";}?>>
                            <!--end input-->

                            <?php echo $ol;?>
                        </label>
                    <?php endforeach; ?>

                    <!--start notes-->
                    <?php if(isset($field['notes'])){ ?><p class="help-block"><?php echo $field['notes'];?></p><?php }?>
                    <!--end notes-->
                </div>
            </div>
        <?php break;
        case 'checkbox':?>
            <?php if(isset($field['extra']['wrapper'])){ ?>
                <div class="<?php echo $field['extra']['wrapper'];?>">
            <?php }else{?>
                <div class="col-xs-12">
            <?php }?>

                <div class="checkbox">
                    <!--start label-->
                    <?php if(isset($field['label'])){ ?><div><strong><?php echo $field['label'];?></strong></div><?php }?>
                    <!--end label-->

                    <?php foreach ($field['default'] as $ov => $ol): ?>
                        <label>
                            <!--start input-->
                            <input
                            type="<?php echo $field['type'];?>"
                            name="<?php echo $key;?>[]"
                            <?php echo (isset($field['disabled']) && $field['disabled']) ? 'disabled="disabled"' : '';?>
                            value="<?php echo $ov;?>"
                            <?php if(isset($item[$key]) && $item[$key] == $ov){ echo " checked=\"checked\" ";}?>>
                            <!--end input-->
                            <?php echo $ol;?>
                        </label>
                    <?php endforeach; ?>

                    <!--start notes-->
                    <?php if(isset($field['notes'])){ ?><p class="help-block"><?php echo $field['notes'];?></p><?php }?>
                    <!--end notes-->
                </div>
            </div>
        <?php break;
        case 'select':?>
            <?php if(isset($field['extra']['wrapper'])){ ?>
                <div class="<?php echo $field['extra']['wrapper'];?>">
            <?php }else{?>
                <div class="col-xs-12">
            <?php }?>

                <div class="form-group">
                    <!--start label-->
                    <?php if(isset($field['label'])){ ?><label><?php echo $field['label'];?></label><?php }?>
                    <!--end label-->

                    <select
                        name="<?php echo $key;?>"
                        id="<?php echo isset($field['id']) ? $field['id'] : '';?>"
                        <?php echo (isset($field['disabled']) && $field['disabled']) ? 'disabled="disabled"' : '';?>
                        class="form-control" style="max-width: 300px;">

                            <?php foreach ($field['default'] as $ov => $ol) :?>
                                <option value="<?php echo $ov;?>" <?php if(isset($item[$key]) && $item[$key] == $ov) echo 'selected="selected"';?>><?php echo $ol;?></option>
                            <?php endforeach;?>
                    </select>

                    <!--start notes-->
                    <?php if(isset($field['notes'])){ ?><p class="help-block"><?php echo $field['notes'];?></p><?php }?>
                    <!--end notes-->
                </div>
            </div>
        <?php break;
        case 'textarea':?>
            <?php if(isset($field['extra']['wrapper'])){ ?>
                <div class="<?php echo $field['extra']['wrapper'];?>">
            <?php }else{?>
                <div class="col-xs-12">
            <?php }?>

                <div class="form-group">
                    <!--start label-->
                    <?php if(isset($field['label'])){ ?><label><?php echo $field['label'];?></label><?php }?>
                    <!--end label-->

                    <textarea
                        id="<?php echo isset($field['id']) ? $field['id'] : '';?>"
                        class="form-control <?php echo isset($field['class']) ? $field['class'] : '';?>"
                        name="<?php echo $key;?>"
                        <?php echo (isset($field['disabled']) && $field['disabled']) ? 'disabled="disabled"' : '';?>>

                        <?php if(isset($item[$key])) {echo $item[$key];}elseif(isset($field['default'])){ echo $field['default'];}?>
                    </textarea>

                    <!--start notes-->
                    <?php if(isset($field['notes'])){ ?><p class="help-block"><?php echo $field['notes'];?></p><?php }?>
                    <!--end notes-->

                    <?php if(isset($ckeditor) && $ckeditor){ echo display_ckeditor($ckeditor); } ?>
                </div>
            </div>
        <?php break;
		case 'info':?>
            <?php if(isset($field['extra']['wrapper'])){ ?>
                <div class="<?php echo $field['extra']['wrapper'];?>">
            <?php }else{?>
                <div class="col-xs-12">
            <?php }?>

                <div class="form-group">
    				<div id="<?php echo isset($field['id']) ? $field['id'] : '';?>" class="bs-callout <?php echo isset($field['class']) ? 'bs-callout-'.$field['class'] : '';?>">

    	                <?php if(isset($field['label'])){ ?>
                            <label><?php echo $field['label'];?></label>
                        <?php }?>

    				</div>
                </div>
            </div>
        <?php break;
        case 'clearfix':?>
             <div class="clearfix"></div>
        <?php break;
        default: break;
        }
}
