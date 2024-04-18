<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6 flex flex-col gap-3">
  <div>
    <h2 class="text-xl font-semibold px-6">카테고리 리스트</h2>
  </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                Category
              </th>    
              <th scope="col" class="px-6 py-3">
                Main
              </th>  
              <th scope="col" class="px-6 py-3">
                Nav
              </th>
              <th scope="col" class="px-6 py-3">
              </th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($cate_list as $key => $cate){?>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4">
                  <?=$cate['ca_name']?>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?=$cate['main_show']=='n'?'미출력':'출략'?>
                </th>
                <td class="px-6 py-4">
                  <?=$cate['nav_show']=='n'?'미출력':'출략'?>
                </td>
                <td class="px-6 py-4">
                    <a href="<?=BASE?>cateRegister?idx=<?=$cate['idx']?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
          <?php  } ?>
        </tbody>
    </table>
    <nav class="flex justify-between mt-6"  aria-label="Page navigation example">
      <a href="<?=BASE?>gsRegister" class="px-3 h-8 ms-0 text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">추가하기</a>
      <ul class="inline-flex -space-x-px text-sm">
        <?php for($i = $startPage; $i<=$endPage; $i++){?>
        <li>
          <?php if($i==$page){?>
            <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"><?=$page?></a>
          <?php }else{?>
            <a href="<?=BASE?>gsList?page=<?=$i?>" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white "><?=$i?></a>  
          <?php } ?>
        </li>
        <?php } ?>
      </ul>
    </nav>
  </nav>
</div>
