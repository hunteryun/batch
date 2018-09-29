#用法：
======================

### 在Controller用的小例子：

其实本质就是利用queue消息队列做稳定的批处理，Drupal 8也是这样做的，
只是想到这只是一个工具，目的是需要做批量导入，迁移等场景时，有个方便快速解决问题的方案
所有做的比较简单，有效就是硬道理！

```
$provider = $providerManager->loadProvider();
$data = entity_load_many('page', array(), array('range' => 10));

foreach ($data as $key => $value) {
  $provider->createItem('test_batch', $value->content);
}

```
