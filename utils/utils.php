<?php

/* 头像调用地址 $uid 登录用户的id */
function txx($uid) {
    $options = Helper::options();
    $name = $uid.'.png';
    $path =  Typecho_Common::url(defined('__TYPECHO_UPLOAD_DIR__') ? __TYPECHO_UPLOAD_DIR__ : '/usr/uploads',
          defined('__TYPECHO_UPLOAD_ROOT_DIR__') ? __TYPECHO_UPLOAD_ROOT_DIR__ : __TYPECHO_ROOT_DIR__)
          . '/avatar';

    $path= $path.'/'.$name;
    if(file_exists($path)) {
    $path = Typecho_Common::url(defined('__TYPECHO_UPLOAD_DIR__') ? __TYPECHO_UPLOAD_DIR__ : '/usr/uploads',
            $options->siteUrl). '/avatar';
    $path= $path.'/'.$name;
    }else {return false;}
    return $path;
}

/* 通过邮箱生成头像地址 */
function _AdminGetAvatarByMail($mail)
{
    $gravatarsUrl = 'https://gravatar.helingqi.com/wavatar/';
    $mailLower = strtolower($mail);
    $md5MailLower = md5($mailLower);
    $qqMail = str_replace('@qq.com', '', $mailLower);
    if (strstr($mailLower, "qq.com") && is_numeric($qqMail) && strlen($qqMail) < 11 && strlen($qqMail) > 4) {
        return 'https://thirdqq.qlogo.cn/g?b=qq&nk=' . $qqMail . '&s=100';
    } else {
        return $gravatarsUrl . $md5MailLower . '?d=mm';
    }
};
