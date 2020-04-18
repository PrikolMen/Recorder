<?php
namespace app\forms;

use std, gui, framework, app;
use php\audio\VoiceRecorder; 
global $recorder; 
class MainForm extends AbstractForm
{


    /**
     * @event buttonAlt.action 
     */
    function doButtonAltAction(UXEvent $e = null)
    {    
        // прерывание записи
        global $recorder; 
        $this->button->enabled = true;
        $this->buttonAlt->enabled = false;
    $recorder->stop(); 
    $this->image->visible = false;
    $this->progressIndicator->visible = false;
    }

    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {
    global $recorder;    
    $recorder = new VoiceRecorder();
    $this->audioData->set('Data',(($this->audioData->get('Data','Sets'))+'1'),'Sets');
    $recorder->maxRecordTime = -1; 
    // запуск записи
    $recorder->start('voice_file'.$this->audioData->get('Data','Sets').'.wav'); 
    $this->button->enabled = false;
    $this->buttonAlt->enabled = true;
    $this->image->visible = true;
    $this->progressIndicator->visible = true;
    }

    /**
     * @event button3.action 
     */
    function doButton3Action(UXEvent $e = null)
    { 
        app()->shutdown();
    }






}
