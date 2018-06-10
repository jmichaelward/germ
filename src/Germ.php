<?php

namespace JMW\Germ;

use JMW\Germ\Command\CloneRepository;
use Symfony\Component\Console\Application;

/**
 * Class Germ
 * @package JMW\Germ
 */
class Germ
{
    /**
     * Our benevolent leader.
     *
     * @var Application
     */
    private $app;

    /**
     * The set of commands we're going to register. The anticipation is killing you, I know.
     *
     * @var array
     */
    private $commands = [
        CloneRepository::class,
    ];

    /**
     * Tinker constructor.
     *
     * @param $app Application
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Register our incredible set of Tinker commands.
     */
    public function registerCommands()
    {
        foreach ($this->commands as $command) {
            $this->app->add(new $command());
        }
    }
}