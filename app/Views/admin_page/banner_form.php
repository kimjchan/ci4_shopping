<form method="post" action="<?=BASE?>gs_banner" encType="multipart/form-data" class="p-6 flex flex-col gap-3">
  <div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">배너 이미지</label>
    <?php if($banner_list[0]['main_img']!=""){?>
      <div class="w-full max-w-[360px]">
        <img class="w-full" src="<?=BASE?>writable/uploads/<?=$banner_list[0]['main_img']?>"/>
      </div>
    <?php } ?>
    <input type="hidden" name="main_img_path"  value="<?=$banner_list[0]['main_img']?>" />
    <input type="file" name="main_img" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input">
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
  </div>
  <div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">배너 이미지02</label>
    <?php if($banner_list[0]['sub_img01']!=""){?>
      <div class="w-full max-w-[360px]">
        <img class="w-full" src="<?=BASE?>writable/uploads/<?=$banner_list[0]['sub_img01']?>"/>
      </div>
    <?php }?>
    <input type="hidden" name="sub_img01_path"  value="<?=$banner_list[0]['sub_img01']?>" />
    <input name="sub_img01" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" value="<?=$banner_list[0]['sub_img01']?>">
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
  </div>
  <div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">배너 이미지03</label>
      <?php if($banner_list[0]['sub_img02']!=""){?>
      <div class="w-full max-w-[360px]">
        <img class="w-full" src="<?=BASE?>writable/uploads/<?=$banner_list[0]['sub_img02']?>"/>
      </div>
      <?php } ?>
      <input type="hidden" name="sub_img02_path"  value="<?=$banner_list[0]['sub_img02']?>" />
      <input name="sub_img02" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" value="<?=$banner_list[0]['sub_img02']?>">
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
  </div>
  <?php if($count>0){?>
    <input type="hidden" value="<?=$banner_list[0]['idx']?>" name="idx"/>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
  <?php }else{ ?>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  <?php } ?>
</form>
