<?php

namespace BonnieDoug\StripeBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use BonnieDoug\StripeBundle\DependencyInjection\BonnieDougStripeExtension;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\Yaml\Parser;

class BonnieDougStripeExtensionTest extends TestCase
{
    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testEmptyConfiguration()
    {
        $extension = new BonnieDougStripeExtension();
        $extension->load([], new ContainerBuilder());
    }

    public function testStripeSecretKey()
    {
        $config = $this->getSimpleConfig();
        $container = new ContainerBuilder();
        $extension = new BonnieDougStripeExtension();
        $extension->load($config, $container);
        $this->assertEquals(
            $config['bonnie_doug_stripe']['secret_key'],
            $container->getParameter('bonnie_doug_stripe.secret_key')
        );
    }

    public function testConfigWithoutDatabase()
    {
        $config = $this->getSimpleConfig();
        $container = new ContainerBuilder();
        $extension = new BonnieDougStripeExtension();
        $extension->load($config, $container);
        $this->assertFalse($container->has('bonnie_doug_stripe.model_transformer'));
        $this->assertFalse($container->has('bonnie_doug_stripe.object_manager'));
        $this->assertFalse($container->has('bonnie_doug_stripe.model_manager'));
        $this->assertFalse($container->has('bonnie_doug_stripe.subscriber.stripe_event'));
        $this->assertFalse($container->hasParameter('bonnie_doug_stripe.model_classes'));
    }

    public function testDefaultDatabaseConfiguration()
    {
        $config = $this->getSimpleConfigWithDatabase();
        $container = new ContainerBuilder();
        $this->setDefinition(
            'doctrine.orm.entity_manager',
            'BonnieDoug\\StripeBundle\\Tests\\Mock\\EntityManagerMock',
            $container
        );
        $extension = new BonnieDougStripeExtension();
        $extension->load($config, $container);
        $this->assertTrue($container->has('bonnie_doug_stripe.model_transformer'));
        $this->assertInstanceOf(
            'BonnieDoug\\StripeBundle\\Transformer\\AnnotationTransformer',
            $container->get('bonnie_doug_stripe.model_transformer')
        );
        $this->assertTrue($container->has('bonnie_doug_stripe.object_manager'));
        $this->assertInstanceOf(
            'BonnieDoug\\StripeBundle\\Tests\\Mock\\EntityManagerMock',
            $container->get('bonnie_doug_stripe.object_manager')
        );
        $this->assertTrue($container->has('bonnieboug_stripe.model_manager'));
        $this->assertInstanceOf(
            'BonnieDoug\\StripeBundle\\Manager\\Doctrine\\DoctrineORMModelManager',
            $container->get('bonnie_doug_stripe.model_manager')
        );
        $this->assertEquals(
            $config['bonnie_doug_stripe']['database']['model'],
            $container->getParameter('bonnie_doug_stripe.model_classes')
        );
        $this->assertTrue($container->has('bonnie_doug_stripe.subscriber.stripe_event'));
    }

    public function testFullConfiguration()
    {
        $config = $this->getFullConfig();
        $container = new ContainerBuilder();
        $this->setDefinition(
            'bonnie_doug_stripe.test.entity_manager',
            'BonnieDoug\\StripeBundle\\Tests\\Mock\\CustomEntityManagerMock',
            $container
        );
        $this->setDefinition(
            'bonnie_doug_stripe.test.transformer',
            'BonnieDoug\\StripeBundle\\Tests\\Mock\\TransformerMock',
            $container
        );
        $extension = new BonnieDougStripeExtension();
        $extension->load($config, $container);
        $this->assertInstanceOf(
            'BonnieDoug\\StripeBundle\\Tests\\Mock\\TransformerMock',
            $container->get('bonnie_doug_stripe.model_transformer')
        );
        $this->assertInstanceOf(
            'BonnieDoug\\StripeBundle\\Tests\\Mock\\CustomEntityManagerMock',
            $container->get('bonnie_doug_stripe.object_manager')
        );
    }

    protected function getSimpleConfig()
    {
        $yaml = <<<EOF
bonnie_doug_stripe:
    secret_key: some_secret_key
EOF;
        $parser = new Parser();

        return $parser->parse($yaml);
    }

    protected function getSimpleConfigWithDatabase()
    {
        $yaml = <<<EOF
bonnie_doug_stripe:
    secret_key: some_secret_key
    database:
        model:
            customer: BonnieDoug\StripeBundle\Tests\TestModel\TestCustomer
EOF;
        $parser = new Parser();

        return $parser->parse($yaml);
    }

    protected function getFullConfig()
    {
        $yaml = <<<EOF
bonnie_doug_stripe:
    secret_key: some_secret_key
    database:
        driver: orm
        object_manager: bonnie_doug_stripe.test.entity_manager
        model_transformer: bonnie_doug_stripe.test.transformer
        model:
            customer: BonnieDoug\StripeBundle\Tests\TestModel\TestCustomer
EOF;
        $parser = new Parser();

        return $parser->parse($yaml);
    }

    protected function setDefinition($id, $class, ContainerBuilder $container)
    {
        $definition = new Definition();
        $definition->setClass($class);
        $container->setDefinition($id, $definition);
    }
}
