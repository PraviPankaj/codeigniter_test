<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * Form message
 *
 * Fetches form message type, message body and returns HTML rendered message.
 *
 * @access  public
 * @param   string message type
 * @param   string message body
 * @return  string response
 */
// if ( ! function_exists('form_message'))
// {
//     function form_message($message_type = 'validation', $message_body = '')
//     {
//         switch ($message_type)
//         {
//             case 'validation':
//                 $message_label = 'danger';
//                 $message_icon = '<i class="fa fa-exclamation-circle"></i>';
//                 break;
//             case 'success':
//                 $message_label = 'success';
//                 $message_icon = '<i class="fa fa-check"></i>';
//                 break;
//             case 'warning':
//                 $message_label = 'warning';
//                 $message_icon = '<i class="fa fa-warning"></i>';
//                 break;
//             case 'danger':
//                 $message_label = 'danger';
//                 $message_icon = '<i class="fa fa-exclamation-circle"></i>';
//                 break;
//             default:
//                 $message_label = 'danger';
//                 $message_icon = '<i class="fa fa-exclamation-circle"></i>';
//                 break;
//         }

//         if ($message_type == 'validation')
//         {
//             if (empty($message_body))
//             {
//                 $form_message = '';
//             }
//             else
//             {
//                 $form_message = '<div class="alert alert-'.$message_label.' role="alert">';
//                 $form_message .= $message_body;
//                 $form_message .= '</div>';
//             }
//         }
//         else
//         {
//             $form_message = '<div class="alert alert-'.$message_label.' alert-dismissible" role="alert">';
//             $form_message .= '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
//             $form_message .= $message_icon.' '.$message_body;
//             $form_message .= '</div>';
//         }

//         return $form_message;
//     }
// }

/**
 * Create form message
 *
 * Create form message.
 *
 * @access  public
 * @param   string message type
 * @param   string message key
 * @param   string message body
 * @return  string response
 */
if ( ! function_exists('create_form_message'))
{
    function create_form_message($message_type = 'validation', $message_key, $message_body = '')
    {
        $CI =& get_instance();

        switch ($message_type)
        {
            case 'validation':
                $message_label = 'danger';
                $message_icon = '<i class="fa fa-exclamation-circle"></i>';
                break;
            case 'success':
                $message_label = 'success';
                $message_icon = '<i class="fa fa-check"></i>';
                break;
            case 'warning':
                $message_label = 'warning';
                $message_icon = '<i class="fa fa-warning"></i>';
                break;
            case 'danger':
                $message_label = 'danger';
                $message_icon = '<i class="fa fa-exclamation-circle"></i>';
                break;
            
            default:
                $message_label = 'danger';
                $message_icon = '<i class="fa fa-exclamation-circle"></i>';
                break;
        }

        if ($message_type == 'validation')
        {
            if (empty($message_body))
            {
                $form_message = '';
            }
            else
            {
                $form_message = '<div class="alert alert-'.$message_label.' role="alert">';
                $form_message .= $message_body;
                $form_message .= '</div>';
            }
        }
        else
        {
            $form_message = '<div class="alert alert-'.$message_label.' alert-dismissible" role="alert">';
            $form_message .= '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
            $form_message .= $message_icon.' '.$message_body;
            $form_message .= '</div>';
        }

        $CI->session->set_flashdata('form_message', array($message_key => $form_message));
    }
}

/**
 * Display form message
 *
 * Create form message.
 *
 * @access  public
 * @param   string message key
 * @return  string response
 */
if ( ! function_exists('display_form_message'))
{
    function display_form_message($message_key)
    {
        $CI =& get_instance();

        $form_messages = $CI->session->flashdata('form_message');

        if ( ! is_empty($form_messages))
        {
            if (array_key_exists($message_key, $form_messages))
            {
                return $form_messages[$message_key];
            }
        }
        
        return NULL;
    }
}