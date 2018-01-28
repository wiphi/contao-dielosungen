<?php
/**
 * @copyright  Philipp Winkel 2018
 * @author     Philipp Winkel
 * @package    DieLosungen
 * @license    MIT
 * @see	       https://github.com/wiphi/dontao-dielosungen
 *
 */
namespace WiPhi\DieLosungen\ContaoManager;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
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
            /*
            BundleConfig::create('WiPhi\DieLosungen\WiPhiDieLosungen')
                ->setLoadAfter(['Contao\CoreBundle\ContaoCoreBundle'])
                ->setReplace(['dielosungen']),
                */
                BundleConfig::create(WiPhiDieLosungenBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
                ->setReplace(['dielosungen'])
        ];
    }
}