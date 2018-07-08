var umSabor =
'<div style="width:100%; height: 100%; background-color: #ccff00; border-radius: 8em;">asas</div>';
var doisSabores =
'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 344 344"> <defs> <pattern id="sabor1" patternUnits="userSpaceOnUse" width="100%" height="100%"> <image xlink:href="img/pizza.png" x="0" y="0" width="100%" height="100%"/> </pattern> <pattern id="sabor2" patternUnits="userSpaceOnUse" width="100%" height="100%"> <image xlink:href="img/pizza2.png" x="-72" y="0" width="100%" height="100%"/> </pattern> <style>.a{fill:url(#sabor1);}.b{fill:url(#sabor2);}</style> </defs> <g id="a" class="a"> <rect width="344" height="344"/> <path d="M172,172V344C77.6,344,0,266.4,0,172S77.6,0,172,0Z" fill="url(#sabor1)" data-target="sabores" data-toggle="modal"/> <path d="M172,172V0c94.4,0,172,77.6,172,172S266.4,344,172,344Z" fill="url(#sabor2)" data-target="sabores" data-toggle="modal"/> </g></svg>';

$("#pizza").html(doisSabores);

// var tresSabores = '
// <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 344 344">
//    <defs>
//       <pattern id="sabor1" patternUnits="userSpaceOnUse" width="100%" height="100%">
//          <image xlink:href="img/pizza.png" x="0" y="-22" width="100%" height="100%" />
//       </pattern>
//       <pattern id="sabor2" patternUnits="userSpaceOnUse" width="100%" height="100%">
//          <image xlink:href="img/pizza2.png" x="-72" y="0" width="100%" height="100%" />
//       </pattern>
//       <pattern id="sabor3" patternUnits="userSpaceOnUse" width="100%" height="100%">
//          <image xlink:href="img/pizza3.png" x="-72" y="-144" width="100%" height="100%" />
//       </pattern>
//       <style>.a{fill:url(#sabor1);}.b{fill:url(#sabor2);}.c{fill:url(#sabor3);}</style>
//    </defs>
//    <g transform="translate(-512 -208)">
//       <path d="M27.361,236.658m-4.838,2.689a168.235,168.235,0,0,0,62.9,62.93l86.555-148.989L85.961,4.3C4.244,51.632-24.249,157.591,22.523,239.347Z" transform="translate(511.987 226.828)" fill="url(#sabor1)" data-target="sabores" data-toggle="modal"/>
//       <path d="M102.017,5.379m0-5.379A173.3,173.3,0,0,0,16,23.128l86.017,148.989H274.052C274.052,77.453,196.1,0,102.017,0Z" transform="translate(581.948 208)" fill="url(#sabor2)" data-target="sabores" data-toggle="modal"/>
//       <path d="M246.1,115.369m4.838,2.689A173.512,173.512,0,0,0,274.052,32H102.017L16,180.989c81.717,47.332,187.625,18.825,234.935-62.93Z" transform="translate(581.948 348.117)" fill="url(#sabor3)" data-target="sabores" data-toggle="modal"/>
//    </g>
// </svg>
// ';

// var quatroSabores = '
// <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 344 344">
//    <defs>
//       <pattern id="sabor1" patternUnits="userSpaceOnUse" width="100%" height="100%">
//          <image xlink:href="img/pizza.png" x="0" y="-22" width="100%" height="100%" />
//       </pattern>
//       <pattern id="sabor2" patternUnits="userSpaceOnUse" width="100%" height="100%">
//          <image xlink:href="img/pizza2.png" x="-72" y="0" width="100%" height="100%" />
//       </pattern>
//       <pattern id="sabor3" patternUnits="userSpaceOnUse" width="100%" height="100%">
//          <image xlink:href="img/pizza3.png" x="-72" y="-144" width="100%" height="100%" />
//       </pattern>
//       <style>.a{fill:url(#sabor1);}.b{fill:url(#sabor2);}.c{fill:url(#sabor3);}</style>
//    </defs>
//    <g transform="translate(-512 -208)">
//       <path d="M27.361,236.658m-4.838,2.689a168.235,168.235,0,0,0,62.9,62.93l86.555-148.989L85.961,4.3C4.244,51.632-24.249,157.591,22.523,239.347Z" transform="translate(511.987 226.828)" fill="url(#sabor1)" data-target="sabores" data-toggle="modal"/>
//       <path d="M102.017,5.379m0-5.379A173.3,173.3,0,0,0,16,23.128l86.017,148.989H274.052C274.052,77.453,196.1,0,102.017,0Z" transform="translate(581.948 208)" fill="url(#sabor2)" data-target="sabores" data-toggle="modal"/>
//       <path d="M246.1,115.369m4.838,2.689A173.512,173.512,0,0,0,274.052,32H102.017L16,180.989c81.717,47.332,187.625,18.825,234.935-62.93Z" transform="translate(581.948 348.117)" fill="url(#sabor3)" data-target="sabores" data-toggle="modal"/>
//    </g>
// </svg>
// ';