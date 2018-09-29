<?php

namespace Hunter\batch\Plugin\Job;

use Hunter\queue\Annotation\QueueJob;

/**
 * @QueueJob(
 *   id = "test_batch",
 *   title = "Test Batch",
 *   type = "queue_job"
 * )
 */
class TestBatch {

  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
    logger()->info($data);
  }

}
