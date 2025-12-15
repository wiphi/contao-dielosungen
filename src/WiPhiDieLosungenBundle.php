<?php
namespace WiPhi\DieLosungen;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

/**
 * Configures the WiPhi DieLosungen bundle.
 *
 * @author Philipp Winkel <https://github.com/wiphi>
 */
class WiPhiDieLosungenBundle extends AbstractBundle
{
    public function loadExtension(
        array $config, 
        ContainerConfigurator $containerConfigurator, 
        ContainerBuilder $containerBuilder,
    ): void
    {
        $containerConfigurator->import('../config/services.yaml');
    }
}