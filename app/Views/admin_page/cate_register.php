<form method="post" action="<?=BASE?>cate_register" class="p-6 flex flex-col gap-3">
  <div>
    <input type="hidden" value="<?=isset($cate_info)?$cate_info['idx']:''?>" name="idx"/>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">카테고리</label>
    <input name="cate_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="카테고리 이름" required value="<?=isset($cate_info)?$cate_info['ca_name']:''?>"/>
  </div>
  <?php if(isset($cate_info['idx'])){?>
    <div class="flex items-center mb-4">
      <input id="default-checkbox" type="checkbox" <?=$cate_info['nav_show']=='y'?'checked':''?> value="on" name="nav_display" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
      <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">메뉴바에 노출</label>
  </div>
  <?php } ?>
  <?php if(isset($cate_info['idx'])){?>
    <div class="flex items-center mb-4">
      <input id="default-checkbox2" type="checkbox" <?=$cate_info['main_show']=='y'?'checked':''?> value="on" name="index_display" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
      <label for="default-checkbox2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">첫페이지 노출</label>
  </div>
  <?php } ?>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
