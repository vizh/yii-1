<?php
AutoLoader::Import('library.rocid.event.*');
 
class EventEdit extends AdminCommand
{
  /**
   * @var Event
   */
  private $event;

  /**
   * Основные действия комманды
   * @param int $id
   * @return void
   */
  protected function doExecute($id = 0)
  {
    $this->view->HeadScript(array('src'=>'/js/geodropdown.js'));

    $this->event = Event::GetById(intval($id));
    if (empty($this->event))
    {
      Lib::Redirect(RouteRegistry::GetAdminUrl('event', '', 'list'));
    }

    if (Yii::app()->getRequest()->getIsPostRequest())
    {
      $data = Registry::GetRequestVar('data');

      $purifier = new CHtmlPurifier();
      $optoins = array('HTML.AllowedElements' => '', 'HTML.AllowedAttributes' => '');
      $purifier->options = $optoins;

      $this->event->Name = $purifier->purify($data['Name']);
      $idName = $purifier->purify($data['IdName']);
      if ($idName != $this->event->IdName)
      {
        $oldLogoPath = $this->event->GetLogo(true);
        $oldMiniLogoPath = $this->event->GetMiniLogo(true);
        $this->event->IdName = $idName;
        if (file_exists($oldLogoPath))
        {
          rename($oldLogoPath, $this->event->GetLogo(true));
        }
        if (file_exists($oldMiniLogoPath))
        {
          rename($oldMiniLogoPath, $this->event->GetMiniLogo(true));
        }
      }
      $this->event->ShortName = $purifier->purify($data['ShortName']);

      $this->event->Info = $purifier->purify($data['Info']);
      $purifier->options = array('AutoFormat.AutoParagraph' => true);
      $this->event->FullInfo = $purifier->purify($data['FullInfo']);
      $purifier->options = $optoins;

      $this->event->Url = $purifier->purify($data['Url']);
      $this->event->UrlRegistration = $purifier->purify($data['UrlRegistration']);
      $this->event->UrlProgram = $purifier->purify($data['UrlProgram']);

      $startDay = intval($data['DateStartDay']);
      $startMonth = min(12, max(0, intval($data['DateStartMonth'])));
      $startYear =  min(9999, intval($data['DateStartYear']));
      $startYear = $startYear < 1000 ? '0000' : $startYear;
      $this->event->DateStart = $startYear . '-' . ($startMonth < 10 ? '0' . $startMonth : $startMonth) . '-' . (!empty($startDay) ? $startDay : '00');

      $endDay = intval($data['DateEndDay']);
      $endMonth = min(12, max(0, intval($data['DateEndMonth'])));
      $endYear =  min(9999, intval($data['DateEndYear']));
      $endYear = $endYear < 1000 ? '0000' : $endYear;
      $this->event->DateEnd = $endYear . '-' . ($endMonth < 10 ? '0' . $endMonth : $endMonth) . '-' . (!empty($endDay) ? $endDay : '00');

      $this->event->Place = $purifier->purify($data['Place']);
      $this->event->Visible = isset($data['Visible']) ? Event::EventVisibleY : Event::EventVisibleN;
      $this->event->Type = $data['Type'] != Event::EventTypePartner ? Event::EventTypeOwn : Event::EventTypePartner;

      $this->saveLogos($this->event);

      $this->event->save();
    }

    $this->view->Name = $this->event->Name;
    $this->view->IdName = $this->event->IdName;
    $this->view->ShortName = $this->event->ShortName;
    $this->view->Info = $this->event->Info;
    $this->view->FullInfo = $this->event->FullInfo;

    $this->view->Url = $this->event->Url;
    $this->view->UrlRegistration = $this->event->UrlRegistration;
    $this->view->UrlProgram = $this->event->UrlProgram;

    $this->view->DateStart = $this->event->GetParsedDateStart();
    $this->view->DateEnd = $this->event->GetParsedDateEnd();

    $this->view->Place = $this->event->Place;
    $this->view->Visible = $this->event->Visible;
    $this->view->Type = $this->event->Type;

    $this->view->Logo = $this->event->GetLogo();
    $this->view->MiniLogo = $this->event->GetMiniLogo();

    echo $this->view;
  }

  /**
   * @return void
   */
  private function saveLogos()
  {
    if ($_FILES['logo']['error'] == UPLOAD_ERR_OK)
    {
      $this->savePng($_FILES['logo']['tmp_name'], $this->event->GetLogo(true));
    }
    if ($_FILES['minilogo']['error'] == UPLOAD_ERR_OK)
    {
      $this->savePng($_FILES['minilogo']['tmp_name'], $this->event->GetMiniLogo(true));
    }
  }

  private function savePng($fromPath, $toPath)
  {
    $imgSizeArray = getimagesize($fromPath);
    $originalType = $imgSizeArray[2];
    if ($originalType == IMAGETYPE_PNG)
    {
      copy($fromPath, $toPath);
    }
  }
}
