<?php

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class OptionsFixture extends \Doctrine\Common\DataFixtures\AbstractFixture implements DependentFixtureInterface
{

	private $demoOptions = [
		//[category, title, value]
		'site_title' => ['general', 'Název webu', 'Site Title'],
		'index' => ['seo', 'Indexovat web', TRUE],
	];

	public function load(ObjectManager $manager)
	{
		foreach ($this->demoOptions as $key => $value) {
			$entity = new \Options\Option($key, $value[2]);
			$entity->setFullName($value[1]);
			$entity->setCategory($this->getReference('option-' . $value[0]));
			$manager->persist($entity);
		}
		$manager->flush();
	}

	/**
	 * This method must return an array of fixtures classes
	 * on which the implementing class depends on
	 *
	 * @return array
	 */
	function getDependencies()
	{
		return [
			OptionCategoriesFixture::class,
		];
	}


}