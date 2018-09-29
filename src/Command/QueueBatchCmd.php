<?php

namespace Hunter\batch\Command;

use Wrep\Daemonizable\Command\EndlessCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Hunter\queue\Plugin\ProviderManager;

/**
 * 执行批量处理任务
 * php hunter queue:batch
 */
class QueueBatchCmd extends EndlessCommand {
    /**
     * {@inheritdoc}
     */
    protected function configure() {
       $this->setName('queue:batch')
            ->setDescription('Process the batch queue')
            ->addOption('delay', null, InputOption::VALUE_OPTIONAL, 'Amount of time to delay failed jobs', 0);
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
      $parms = $input->getOptions();

      $providerManager = new ProviderManager();
      $provider = $providerManager->loadProvider();
      $response = $provider->receiveItem($parms);

      $output->writeln('['.date("Y-m-d H:i:s").'] '.$response);
    }

}
