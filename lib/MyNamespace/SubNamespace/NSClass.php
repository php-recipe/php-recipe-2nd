<?php
# サブ名前空間を指定します。
namespace MyNamespace\SubNamespace;

const STABLE_DATA = '名前空間 MyNamespace\SubNamespace の定数';

class NSClass
{
  public static function show()
  {
    return 'SubNamespace の NSClass の show() メソッド';
  }
}
