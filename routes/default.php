<?php

use Illuminate\Support\Facades\Route;

 /* ======================
    | Default Route Management
    | Route Group
    =========================  */

  if(Request::is(['menu_app','menu_app/*'])){
      require __DIR__.'/management/menu_app.php';

  }else if(Request::is(['jenisagenda','jenisagenda/*'])){
      require __DIR__.'/management/jenisagenda.php';

  }else if(Request::is(['jabatan','jabatan/*'])){
      require __DIR__.'/management/jabatan.php';

  }else if(Request::is(['jnsberita','jnsberita/*'])){
      require __DIR__.'/management/jenisberita.php';

  }else if(Request::is(['aksesuser','aksesuser/*'])){
      require __DIR__.'/management/aksesuser.php';

  }else if(Request::is(['myprofile','myprofile/*'])){
      require __DIR__.'/management/myprofile.php';

  }else if(Request::is(['activity','activity/*'])){
      require __DIR__.'/management/activity.php';

  }else if(Request::is(['mail_in','mail_in/*'])){
    require __DIR__.'/management/mail_in.php';

  }else if(Request::is(['mail_out','mail_out/*'])){
  require __DIR__.'/management/mail_out.php';
  }
  /* ======================
  | Default Route Web Configuration
  | Route Group
  =========================  */
  else if(Request::is(['webhome','webhome/*'])){
      require __DIR__.'/management/webhome.php';

  }else if(Request::is(['webabout','webabout/*'])){
      require __DIR__.'/management/webabout.php';

  }else if(Request::is(['webnews','webnews/*'])){
      require __DIR__.'/management/webnews.php';
  }
  else if(Request::is(['webprogram','webprogram/*']))
  {
      require __DIR__.'/management/webprogram.php';
  }
  /* ======================
      | Default Route Keanggotaan
      | Route Group
      =========================  */
  else if(Request::is(['anggota','anggota/*'])){
      require __DIR__.'/keanggotaan/anggota.php';

  }else if(Request::is(['rombel','rombel/*'])){
      require __DIR__.'/kesiswaan/rombel.php';

  }else if(Request::is(['scheduleSubject','scheduleSubject/*'])){
      require __DIR__.'/kesiswaan/scheduleSubject.php';

  }
