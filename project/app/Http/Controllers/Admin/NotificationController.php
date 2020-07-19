<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function user_notf_count()
  {
    $data = Notification::where('user_id', '!=', null)->where('is_read', '=', 0)->get()->count();
    return response()->json($data);
  }

  public function user_notf_clear()
  {
    $data = Notification::where('user_id', '!=', null);
    $data->delete();
  }

  public function user_notf_show()
  {
    $datas = Notification::where('user_id', '!=', null)->latest('id')->get();
    if ($datas->count() > 0) {
      foreach ($datas as $data) {
        $data->is_read = 1;
        $data->update();
      }
    }
    return view('admin.notification.register', compact('datas'));
  }


  public function order_notf_count()
  {
    $data = Notification::where('order_id', '!=', null)->where('is_read', '=', 0)->get()->count();
    $status = Notification::where('status_id', '!=', null)->where('is_read', '=', 0)->get()->count();

    return response()->json($data + $status);
  }

  public function order_notf_clear()
  {
    $data = Notification::where('order_id', '!=', null);
    $data->delete();

    $status = Notification::where('status_id', '!=', null);
    $status->delete();
  }

  public function order_notf_show()
  {
    $datas = Notification::where('order_id', '!=', null)->latest('id')->get();
    if ($datas->count() > 0) {
      foreach ($datas as $data) {
        $data->is_read = 1;
        $data->update();
      }
    }

    $statuses = Notification::where('status_id', '!=', null)->latest('id')->get();
    if ($statuses->count() > 0) {
      foreach ($statuses as $status) {
        $status->is_read = 1;
        $status->update();
      }
    }

    return view('admin.notification.order', compact('datas', 'statuses'));
  }


  public function product_notf_count()
  {
    $data = Notification::where('product_id', '!=', null)->where('is_read', '=', 0)->get()->count();
    return response()->json($data);
  }

  public function product_notf_clear()
  {
    $data = Notification::where('product_id', '!=', null);
    $data->delete();
  }

  public function product_notf_show()
  {
    $datas = Notification::where('product_id', '!=', null)->latest('id')->get();
    if ($datas->count() > 0) {
      foreach ($datas as $data) {
        $data->is_read = 1;
        $data->update();
      }
    }
    return view('admin.notification.product', compact('datas'));
  }


  public function conv_notf_count()
  {
    $data = Notification::where('conversation_id', '!=', null)->where('is_read', '=', 0)->get()->count();
    return response()->json($data);
  }

  public function conv_notf_clear()
  {
    $data = Notification::where('conversation_id', '!=', null);
    $data->delete();
  }

  public function conv_notf_show()
  {
    $datas = Notification::where('conversation_id', '!=', null)->latest('id')->get();
    if ($datas->count() > 0) {
      foreach ($datas as $data) {
        $data->is_read = 1;
        $data->update();
      }
    }
    return view('admin.notification.message', compact('datas'));
  }
}
