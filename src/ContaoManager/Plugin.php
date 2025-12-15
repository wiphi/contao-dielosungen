<?php
/**
 * @author     Philipp Winkel
 * @package    DieLosungen
 * @license    MIT
 * @see	       https://github.com/wiphi/contao-dielosungen
 *
 */
namespace WiPhi\DieLosungen\ContaoManager;

use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\CoreBundle\ContaoCoreBundle;

use WiPhi\DieLosungen\WiPhiDieLosungenBundle;

/**
 * Plugin for the Contao Manager.
 *
 * @author Philipp Winkel
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(WiPhiDieLosungenBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
        ];
    }
}