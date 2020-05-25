<?php

namespace Jason\Chain33\Kernel;

class Consts
{

    /**
     * Manage 合约中用到的几个常量
     */
    const TOKEN_FINISHER  = 'token-finisher';
    const TOKEN_BLACKLIST = 'token-blacklist';
    const OP_ADD          = 'add';
    const OP_DELETE       = 'delete';

    /**
     * token属性类别，0 为普通token
     */
    const TOKEN_COMMON    = 0;
    /**
     * token属性类别，1 可增发和燃烧
     */
    const TOKEN_MINT_BURN = 1;

    /**
     * 查询所有预创建的token
     */
    const TOKEN_CREATED = 1;
    /**
     * 查询所有创建成功的token
     */
    const TOKEN_PREPARED = 0;

}
