<?php
class CopyCopyright_Plugin implements Typecho_Plugin_Interface{
    /**
     * 网页复制信息时自动提示版权代码
     * @package Copy copyright 
     * @version 1.0.4
     * @author 菜菜小豪
     * @link http://www.zhihao1.cn
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate(){
        Typecho_Plugin::factory('Widget_Archive')->header = array('CopyCopyright_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('CopyCopyright_Plugin', 'footer');
    }
    
    
    
     /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
        
    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){
        $name = new Typecho_Widget_Helper_Form_Element_Text('word', NULL, '复制成功！若要转载请务必保留菜菜小豪www.zhihao1.cn原文链接，申明来源，谢谢合作！', _t('复制成功后显示的文字'));
        $form->addInput($name);
    }
    
       /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){

    }
    
    /* 插件实现方法 */
    public static function header(){
        $Path = Helper::options()->pluginUrl . '/CopyCopyright/';
        echo '<script src=" https://code.jquery.com/jquery-3.1.1.min.js"></script>';
        echo '<script src="' . $Path . 'js/style.js" type="text/javascript"></script>';
		echo '<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">';
        
    }

    public static function footer(){
        $Path = Helper::options()->pluginUrl . '/CopyCopyright/';
         echo '<script type="text/javascript">
         
         
           // toastr配置
         toastr.options = {
            "closeButton": true, //是否显示关闭按钮
            "debug": false, //是否使用debug模式
            "progressBar": true, //是否显示进度条，当为false时候不显示；当为true时候，显示进度条，当进度条缩短到0时候，消息通知弹窗消失
            "positionClass": "toast-top-center",//显示的动画时间
            "showDuration": "400", //显示的动画时间
            "hideDuration": "1000", //消失的动画时间
            "timeOut": "1500", //展现时间
            "extendedTimeOut": "1000", //加长展示时间
            "showEasing": "swing", //显示时的动画缓冲方式
            "hideEasing": "linear", //消失时的动画缓冲方式
            "showMethod": "fadeIn", //显示时的动画方式
            "hideMethod": "fadeOut" //消失时的动画方式
        }
        
        function warning(){
             if(navigator.userAgent.indexOf("MSIE")>0) { 
             toastr.info("'.Helper::options()->plugin('CopyCopyright')->word.'"); 
             } else { 
                toastr.info("'.Helper::options()->plugin('CopyCopyright')->word.'"); 
             }
        }
        
        document.body.oncopy=function(){warning();}
        </script>';
    }
}