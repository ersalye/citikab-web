<?php $__env->startSection('main'); ?>
<div id="app-wrapper" class="signup-riders" ng-controller="facebook_account_kit">
  <header class="funnel" style="background:url('images/blue-global.png') center center repeat;" >
    <div class="bit bit--logo text--center">
      <a href="<?php echo e(url('/')); ?>">
       <img class="white_logo" src="<?php echo e($logo_url); ?>" style="width: 109px; height: 50px;background-size: contain;">
     </a> 
   </div>
 </header>  
 <section class="content-signupdrive ">

  <div class="signup-wrapper">
    <div class="stage">
      <section class="signup-top">
        <div class="signup-top-text">
          <h2 class="text-center m-b-12"><?php echo e(trans('messages.footer.siginup_ride')); ?></h2>
          <p style="font-size: 150%; margin-bottom: 40px;" align="center"><?php echo e(trans('messages.user.safe_reliable')); ?></p>
        </div>
      </section>
      <div class="form-wrapper text_frm">
        <?php echo e(Form::open(array('url' => 'rider_register','id'=>"form"))); ?>

        <?php echo Form::hidden('fb_id', @$user['fb_id'], ['id' => 'fb_id']); ?>

        <?php echo e(csrf_field()); ?>

        <?php echo Form::hidden('request_type', '', ['id' => 'request_type' ]); ?>

        <input type="hidden" name="user_type" value="Rider">
        <div class="layout layout--flush col-md-12 container-field clearfix push-small--bottom">
          <div class="filed-half res-full col-md-6 input-group">
            <div class="field">
              <label class="field__label" for="fname"><?php echo e(trans('messages.user.firstname')); ?></label>
              <?php echo Form::text('first_name', @$user['first_name'], ['class' => 'field__input one-column-form__input--text','placeholder' => trans('messages.user.firstname'),'id' => 'fname' ]); ?>

            </div>
            <span class="text-danger first_name_error"><?php echo e($errors->first('first_name')); ?></span>
          </div>
          <div class="filed-half  res-full col-md-6 clearfix">
            <div class="field">
              <label class="field__label" for="lname"><?php echo e(trans('messages.user.lastname')); ?></label>
              <?php echo Form::text('last_name', @$user['last_name'], ['class' => 'field__input one-column-form__input--text','placeholder' => trans('messages.user.lastname'),'id' => 'lname' ]); ?>

            </div>
            <span class="text-danger last_name_error"><?php echo e($errors->first('last_name')); ?></span>
          </div>
        </div>
        <div class="layout col-md-12 layout--flush float mobile-container left two-char" ng-init="old_country_code=<?php echo e(old('country_code')!=null? old('country_code') : '1'); ?>">
          <div class="layout__item" id="country">
            <div id="select-title-stage"><?php echo e(old('country_code')!=null? '+'.old('country_code') : '+1'); ?></div>
            <div class="select select--xl">
              <label for="mobile-country"><div class="flag US"></div></label>
              <select name="country_code" tabindex="-1" id="mobile_country" class="square borderless--right">
                <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value->phone_code); ?>" <?php echo e(($value->phone_code == (old('country_code')!=null? old('country_code') : '1')) ? 'selected' : ''); ?> data-value="+<?php echo e($value->phone_code); ?>"><?php echo e($value->long_name); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select> 
              <span class="text-danger country_code_error"><?php echo e($errors->first('country_code')); ?></span>               
            </div>
          </div>
          <div class="layout__item number">
            <div class="input-group icon-input right ">
              <div class="layout layout--flush col-md-12 container-field clearfix push-small--bottom">
                <div class="field" ng-init="old_mobile_number='<?php echo e(old('mobile_number')!=null?old('mobile_number'):''); ?>'">
                  <label class="field__label" for="mobile" style="padding-left:0px;font-weight:bold;margin-top: 0px !important;"><?php echo e(trans('messages.profile.mobile')); ?></label>
                  <?php echo Form::tel('mobile_number', '', ['class' => 'field__input one-column-form__input--text','placeholder' => trans('messages.profile.mobile'),'id' => 'mobile','maxlength' => '15' ,'style'=>'margin:0px !important']); ?>

                  <i class="fa fa-mobile inside-ion" aria-hidden="true" style="font-size: 16px;"></i>
                </div>
                <span class="text-danger mobile_number_error"><?php echo e($errors->first('mobile_number')); ?></span>
                <span class="text-danger mobile-text-danger" style="display: none">Mobile Number is required</span>             
              </div>
            </div>
          </div>
        </div>
        <div class="input-group icon-input right ">
          <div class="layout layout--flush col-md-12 container-field clearfix push-small--bottom">
            <div class="field">
              <label class="field__label" for="input-email"><?php echo e(trans('messages.user.email')); ?></label>
              
              <?php echo Form::text('email', '', ['class' => 'field__input one-column-form__input--text','placeholder' => trans('messages.user.email'),'id' => 'input-email','style' => 'margin:0px !important' ]); ?>

              <i class="fa fa-envelope inside-ion" aria-hidden="true" style="font-size: 11px;"></i>
            </div>
            <span class="text-danger email_error"><?php echo e($errors->first('email')); ?></span>
          </div>
        </div>

        <div class="input-group icon-input right ">
          <div class="layout layout--flush col-md-12 container-field clearfix push-small--bottom">
            <div class="field">
              <label class="field__label" for="password"><?php echo e(trans('messages.user.paswrd')); ?></label>            
              <?php echo Form::password('password', array('class' => 'field__input one-column-form__input--text','placeholder' => trans('messages.user.paswrd'),'id' => 'password','style' => 'margin:0px !important') ); ?>

              <i class="fa fa-lock inside-ion" aria-hidden="true" style="font-size: 13px;"></i>
            </div>
            <span class="text-danger password_error"><?php echo e($errors->first('password')); ?></span>
          </div>
        </div>
      <!--   <div class="input-group icon-input right float" id="promotion-container">
          <div id="promo-input">
            <label for="promo"><?php echo e(trans('messages.user.promo')); ?></label>
              <input name="promotion_code" class="text-input square text-input--large" placeholder="Promo code" id="promo" type="promo">
                 <span class="icon-input__icon icon icon_promo"></span>
                <span class="error-notice form-caption form-caption--error"></span>
          </div>
        </div> -->
        <div class="text--center" id="captcha-form-container" style="display: none;">
          <div id="captcha" class="push--bottom display--inline-block text--center"></div>
        </div>

        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
        <input type="hidden" name="code" id="code" />

        <button id="submit-btn" ng-click="showPopup();" type="button" class="btn btn--full btn--primary btn--large btn--arrow signup-btn">
          <span class="float--left push-small--right"><?php echo e(trans('messages.home.siginup')); ?></span>
          <i class="fa fa-long-arrow-right icon icon_right-arrow-thin"></i>
        </button>
        <?php echo e(Form::close()); ?>

        <p class="push-tiny--top legal"><?php echo e(trans('messages.user.clicking_terms')); ?>

          <a href="<?php echo e(url('terms_of_service')); ?>"><?php echo e($site_name); ?><?php echo e(trans('messages.user.terms')); ?> </a> <?php echo e(trans('messages.user.and')); ?> 
          <a href="<?php echo e(url('privacy_policy')); ?>"><?php echo e(trans('messages.user.privacy')); ?></a>
          .</p>
          <div class="small push-small--bottom push-small--top" id="sign-up-link-only" data-reactid="26">
            <p class=" display--inline email_phone-sec" data-reactid="27"><a href="<?php echo e(url('signin_rider')); ?>"><?php echo e(trans('messages.ride.already_have_account')); ?> </a></p>
            <p class="pull-right forgot password-sec hide">
             <a href="<?php echo e(url('forgot_password_rider')); ?>" class="forgot-password"><?php echo e(trans('messages.user.forgot_paswrd')); ?></a>
           </p>
         </div>

       </div>
     </div>
   </section>
 </div>

 
</main>
<style>
 .logo-link
 {
  display: none;
}
.funnel
{
  height: 0px !important;
}


</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templatesign', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>