<nav class="w-full fixed bg-cyan-400 top-0 left-0 flex justify-center z-30">
  <div class="w-[1200px] flex justify-between h-24 items-center">
    <a href="<?=BASE?>" class="w-[120px] h-12 border border-solid border-gray-100">Logo</a>
    <div class="w-[480px] h-12 border border-solid border-gray-100">메뉴바</div>
    <div class="h-12 flex gap-1">
      <div class="p-3 hover:bg-gray-100 cursor-pointer rounded-full overflow-hidden">
        <span class="material-symbols-outlined">search</span>
      </div>
      <a href="<?=BASE?>cart"  class="p-3 hover:bg-gray-100 cursor-pointer rounded-full overflow-hidden">
        <span class="material-symbols-outlined">
          shopping_cart
        </span>
      </a>
      <div class="p-3 hover:bg-gray-100 cursor-pointer rounded-full overflow-hidden">
        <span class="material-symbols-outlined">
          menu
        </span>
      </div>
      <a href="<?=BASE?>login" class="p-3 hover:bg-gray-100 cursor-pointer rounded-full overflow-hidden">
        <sapn class="material-symbols-outlined">
          account_circle
        </sapn>
      </a>
      <a href="<?=BASE?>join" class="p-3 hover:bg-gray-100 cursor-pointer rounded-full overflow-hidden">
        <sapn class="material-symbols-outlined">
          person_add
        </sapn>
      </a>
    </div>
  </div>
</nav>