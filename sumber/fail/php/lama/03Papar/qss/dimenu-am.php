<?php
$sektor  = (isset($this->_jadual)) ? $this->_jadual : null;
$link[0] = URL . 'qss';
$link[1] = URL . 'qss/suku' . $this->suku . '/' . $this->dataID . '/' . $this->suku . '/edagang';
$link[2] = 'https://qss.stats.gov.my/qssv2/pdf/pdf3.php?no_siri=' . $this->dataID . '&sukutahun=' . $this->suku .'&tahun=2018';
$link[3] = 'https://qss.stats.gov.my/qssv2/pagemenu.php?pref=2&getSerial=' . $this->dataID . '';
$link[4] = 'https://qss.stats.gov.my/qssv2/pagemenu.php?pref=8&getSerial=' . $this->dataID . '';
?>
Sektor : <?php echo $sektor ?> | <a href="<?php echo $link[0] ?>">Anjung</a>
| <a href="<?php echo $link[1] ?>"><?php echo 'Edagang' ?></a>
| <a target="_blank" href="<?php echo $link[2] ?>"><?php echo 'PDF' ?></a>
| <a target="_blank" href="<?php echo $link[3] ?>"><?php echo 'Suku 3' ?></a>
| <a target="_blank" href="<?php echo $link[4] ?>"><?php echo 'Suku 3-Negatif' ?></a>
|