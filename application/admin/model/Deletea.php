<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiang
 * Date: 2017/12/20
 * Time: 11:46
 */

namespace app\admin\model;
use think\Model;
use traits\model\SoftDelete;


class Deletea extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

}