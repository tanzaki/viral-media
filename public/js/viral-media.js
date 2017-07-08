/**
 * Created by qtvha on 6/22/2017.
 */
jQuery(function ($) {
    //BEGIN: Setup events for Buttons switch form
    var btn_choose_files = $('<div class="button-switch-form"></div>');
    var btn_paste_image = $('<div class="button-switch-form"></div>');
    var btn_paste_video = $('<div class="button-switch-form"></div>');
    var btn_make_meme = $('<div class="button-switch-form"></div>');
    //END: Setup events for Buttons switch form
    var form_create_media = $('#form-upload');
    form_create_media.find('.buttons-switch-form').append(btn_choose_files,btn_paste_image,btn_paste_video,btn_make_meme);

    btn_choose_files.wrap($('<div class="col-xs-3"></div>'));
    btn_paste_image.wrap($('<div class="col-xs-3"></div>'));
    btn_paste_video.wrap($('<div class="col-xs-3"></div>'));
    btn_make_meme.wrap($('<div class="col-xs-3"></div>'));


    btn_choose_files.addClass('icon-box-choose_files').prepend('<div class="icon_box-text">Choose files</div>').prepend('<div class="icon"></div>');
    btn_paste_image.addClass('icon-box-paste_image').prepend('<div class="icon_box-text">Paste image url</div>').prepend('<div class="icon"></div>');
    btn_paste_video.addClass('icon-box-paste_video').prepend('<div class="icon_box-text">Paste video url</div>').prepend('<div class="icon"></div>');
    btn_make_meme.addClass('icon-box-make_meme').prepend('<div class="icon_box-text">Make meme</div>').prepend('<div class="icon"></div>');

    var deactivate_button = function (button) {
        button.removeClass('active');
    };
    var deactivate_buttons = function () {
        deactivate_button(btn_paste_image);
        deactivate_button(btn_make_meme);
        deactivate_button(btn_choose_files);
        deactivate_button(btn_paste_video);
    };
    form_create_media.find('.btn-submit').text('Next');
    form_create_media.find('.btn-cancel').text('Close');

    var activate_button = function (button) {
        deactivate_buttons();
        button.addClass('active');
    };
    var create_media_type;
    var switch_form_create_media = function (form_id) {
        create_media_type = form_id;
        console.log(create_media_type);

        if(create_media_type === 'paste_image') {
            form_create_media.find('#media_input').attr('type', 'text');
            form_create_media.find('.title').text('Paste Image URL');
            activate_button(btn_paste_image);
        }
        if(create_media_type === 'paste_video') {
            form_create_media.find('#media_input').attr('type', 'text');
            form_create_media.find('.title').text('Paste Video URL');
            activate_button(btn_paste_video);
        }
        if(create_media_type === 'make_meme') {
            window.open('http://memeful.com/generator','_blank');
        }
        if(create_media_type === 'choose_files') {
            form_create_media.find('#media_input').attr('type', 'file');
            form_create_media.find('.title').text('Choose files');
            activate_button(btn_choose_files);
        }
    };
    switch_form_create_media('choose_files');
    btn_paste_image.click(function () {
        switch_form_create_media('paste_image');
    });
    btn_paste_video.click(function () {
        switch_form_create_media('paste_video');
    });
    btn_make_meme.click(function () {
        switch_form_create_media('make_meme');
    });
    btn_choose_files.click(function () {
        switch_form_create_media('choose_files');
    });
});
jQuery(function ($) {
    var gags = $('.gag-item');
    gags.each(function () {
        var $gag = $(this);
        $gag.find('.btn-like,.btn-dislike').click(function () {
            var $btn = $button = $(this);
            var is_button_dislike = ($btn.hasClass('btn-dislike'));
            var is_button_like = ($btn.hasClass('btn-like'));
            var gag_id = $gag.data('id');
            var updateButtonsStatus = function (response) {
                console.log(response);
                $gag.find('.btn-like').toggleClass('btn-status-liked', response.is_user_liked);
                $gag.find('.btn-dislike').toggleClass('btn-status-disliked', response.is_user_disliked);
                $gag.find('.likes-count').text(response.gag_votes);
            };

            var url_to_reaction_this_gag;
            if (is_button_like) {
                url_to_reaction_this_gag = PUBLIC_URL + '/gag/' + gag_id + '/like';
            }

            if (is_button_dislike) {
                url_to_reaction_this_gag = PUBLIC_URL + '/gag/' + gag_id + '/dislike';
            }
            $
                .ajax(url_to_reaction_this_gag)
                .then(updateButtonsStatus)
            ;
        });
    })
});
