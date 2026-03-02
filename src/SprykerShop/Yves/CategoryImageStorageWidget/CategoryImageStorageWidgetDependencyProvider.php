<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\CategoryImageStorageWidget;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;
use SprykerShop\Yves\CategoryImageStorageWidget\Dependency\CategoryImageStorageWidgetToCategoryImageStorageClientBridge;

class CategoryImageStorageWidgetDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const CLIENT_CATEGORY_IMAGE_STORAGE = 'CLIENT_CATEGORY_IMAGE_STORAGE';

    public function provideDependencies(Container $container): Container
    {
        $container = $this->addCategoryImageStorageClient($container);

        return $container;
    }

    protected function addCategoryImageStorageClient(Container $container): Container
    {
        $container->set(static::CLIENT_CATEGORY_IMAGE_STORAGE, function (Container $container) {
            return new CategoryImageStorageWidgetToCategoryImageStorageClientBridge(
                $container->getLocator()->categoryImageStorage()->client(),
            );
        });

        return $container;
    }
}
