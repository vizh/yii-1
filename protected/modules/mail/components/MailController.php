<?php
namespace mail\components;

class MailController extends \CController
{
  protected $user;
  protected $showUnsubscribeLink;

  /**
   * @param \user\models\User $user
   * @param string $template
   */
  public function __construct(\user\models\User $user, $template = null, $showUnsubscribeLink = true)
  {
    parent::__construct('default', null);
    switch ($template)
    {
      case \mail\models\Layout::OneColumn: $layout = 'one-column';
        break;

      case \mail\models\Layout::TwoColumn: $layout = 'two-column';
        break;

      default: $layout = 'empty';
        break;
    }
    $this->layout = '/layouts/mail/'.$layout;
    $this->user = $user;
    $this->showUnsubscribeLink = $showUnsubscribeLink;
  }
}
