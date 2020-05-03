<?php

namespace Jason\Chain33;

trait AllianceTrait
{

    /**
     * Notes: 查询节点同步状态
     * @Author: <C.Jason>
     * @Date: 2020/5/3 22:14
     * @return mixed
     */
    public function isSync()
    {
        return $this->net->isSync();
    }

    /**
     * Notes: 创建账户（本地，不上链的）
     * @Author: <C.Jason>
     * @Date: 2020/5/3 22:14
     * @return mixed
     */
    public function newAccountLocal()
    {
        return $this->account->local();
    }

    /**
     * Notes: 验证地址（这个没做到）
     * @Author: <C.Jason>
     * @Date: 2020/5/3 22:14
     */
    public function validAddress()
    {

    }

    /**
     * Notes: 构造并签名转账交易
     * @Author: <C.Jason>
     * @Date: 2020/5/3 22:23
     */
    public function transferBalanceMain()
    {

    }

    /**
     * Notes: 发送3.1中构造并签好名的交易
     * @Author: <C.Jason>
     * @Date: 2020/5/3 22:25
     * @param string $data
     * @return string
     */
    public function submitTransaction(string $data): string
    {
        return $this->transcation->send($data);
    }

    /**
     * Notes: 查询主积分余额
     * @Author: <C.Jason>
     * @Date: 2020/5/3 22:26
     * @param array $addresses
     * @param string $execer
     */
    public function getCoinsBalance(array $addresses, string $execer)
    {

    }

    /**
     * Notes:  自定义积分的黑名单配置,审核者配置
     * @Author: <C.Jason>
     * @Date: 2020/5/3 22:17
     * @param string $key
     * @param string $value
     * @param string $op
     * @param string $privateKey
     * @param string $execer
     */
    public function createManage(string $key, string $value, string $op, string $privateKey, string $execer)
    {

    }

    function createPrecreateTokenTx(string $execer, string $name, string $symbol, string $introduction, int $total, int $price, string $owner, int $category, string $privateKey)
    {

    }

    function createTokenFinishTx(string $symbol, string $execer, string $ownerAddr, string $managerPrivateKey)
    {
    }

    function reateTokenTransferTx(string $privateKey, string $toAddress, string $execer, int $amount, string $coinToken, string $note)
    {
    }

    function queryCreateTokens(int $status, string $execer)
    {

    }

    function getTokenBalance(array $addresses, string $execer, string $tokenSymbol)
    {

    }

    function createOnlyNotaryStorage(string $content, string $execer, string $privateKey)
    {

    }

    function createHashStorage(string $hash, string $execer, string $privateKey)
    {

    }

    function createLinkNotaryStorage(string $link, string $hash, string $execer, string $privateKey)
    {

    }

    function queryStorage(string $hash)
    {

    }

}
