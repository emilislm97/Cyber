<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
        *{font-family:"Work Sans",sans-serif}.ps-page--comming-soon{text-align:center;padding-bottom:50px}.ps-page__header{background-color: #4263ce
                                                                                                          }  .ps-btn,button.ps-btn{display:inline-block;padding:15px 45px;font-size:16px;font-weight:600;line-height:20px;color:#000;border:none;font-weight:600;border-radius:4px;background-color: #2249a4;transition:all .4s ease;cursor:pointer}  .ps-page--comming-soon .ps-page__header{padding:50px 0}  .ps-page--comming-soon .ps-page__header .ps-logo{display:inline-block}  .ps-page--comming-soon .ps-page__header h1{margin-bottom:20px;font-size:36px;font-weight:600}  .ps-btn a{text-decoration:none;color:#fff}  .ps-page__content{margin-top:50px}
    </style>
</head>
<body>
<div class="ps-page--comming-soon">
    <div class="ps-page__header">
        <a class="ps-logo" href=""><img src="./assets/logo/web/main-light.png" alt=""></a>
    </div>
    <div class="ps-page__content">
        <h1>Elektron poçt hesabını təsdiqlə:</h1>
    </div>
    <div class="form-group submit">
        <a class="ps-btn ps-btn--fullwidth" href="{{route('sing_in_view',['email' => $data['email'],'token' => $data['token']])}}">Təsdiqlə</a>
    </div>
</div>
</body>
</html>
