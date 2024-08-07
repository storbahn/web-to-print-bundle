<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Bundle\WebToPrintBundle\Tests\Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Pimcore\Bundle\WebToPrintBundle\Installer;
use Pimcore\Model\DataObject\Customer;
use Pimcore\Tests\Support\Helper\Model as PimcoreTestModel;
use Pimcore\Tests\Support\Helper\Pimcore;
use Pimcore\Tests\Support\Util\Autoloader;

class Model extends PimcoreTestModel
{
    public function _beforeSuite($settings = []): void
    {
        /** @var Pimcore $pimcoreModule */
        $pimcoreModule = $this->getModule('\\' . Pimcore::class);

        // install web-to-print bundle
        $installer = $pimcoreModule->getContainer()->get(Installer::class);
        $installer->install();

        Autoloader::load(Customer::class);
    }
}
