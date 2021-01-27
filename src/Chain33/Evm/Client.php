<?php

namespace Jason\Chain33\Evm;

use Jason\Chain33\Kernel\BaseClient;

/**
 * Class Client
 * @package Jason\Chain33\Evm
 */
class Client extends BaseClient
{

    /**
     * Notes   : 部署合约
     * @Date   : 2021/1/27 2:12 下午
     * @Author : < Jason.C >
     * @param  string  $code   部署合约的合约代码
     * @param  string  $abi    部署合约的ABI代码
     * @param  string  $alias  部署新合约时的合约别名，方便识别不同合约
     * @return string
     */
    public function deploy(string $code, string $abi, string $alias): string
    {
        return $this->client->CreateTransaction([
            'execer'     => 'evm',
            'actionName' => 'CreateCall',
            'payload'    => [
                'isCreate' => true,
                'code'     => $code,
                'abi'      => $abi,
                'alias'    => $alias,
                'fee'      => 3000000,
            ],
        ]);
    }

    /**
     * Notes   : 调用合约
     * @Date   : 2021/1/27 2:17 下午
     * @Author : < Jason.C >
     * @param  string  $name    调用的合约名称
     * @param  string  $abi     合约的ABI代码
     * @param  int     $amount  合约调用时，如果需要传递金额，通过这个参数
     * @param  string  $note    本次交易的备注信息
     * @return mixed
     */
    public function invoking(string $name, string $abi, int $amount = 0, string $note = '')
    {
        return $this->client->CreateTransaction([
            'execer'     => 'evm',
            'actionName' => 'CreateCall',
            'payload'    => [
                'isCreate' => false,
                'name'     => $name,
                'abi'      => $abi,
                'note'     => $note,
                'amount'   => $amount,
            ],
        ]);
    }

    /**
     * Notes   : 创建EVM合约交易
     * @Date   : 2021/1/27 1:44 下午
     * @Author : < Jason.C >
     * @param  bool    $isCreate  是否为创建合约动作，创建合约为true，调用合约为false
     * @param  string  $name      调用的合约名称，当isCreate为false时有效且必填
     * @param  string  $code      需要部署或者调用合约合约代码
     * @param  string  $abi       需要部署或调用的合约ABI代码
     * @param  string  $alias     部署新合约时的合约别名，方便识别不同合约
     * @param  string  $note      本次交易的备注信息
     * @param  int     $amount    合约调用时，如果需要传递金额，通过这个参数
     * @param  int     $fee       本次交易你的手续费，需要大约合约消耗的gas值*gasPrice
     * @param  int     $gasPrice  单位gas定价，默认为1
     * @param  int     $gasLimit  本次交易允许消耗的最大gas量，默认值和fee相等
     * @return string             交易内容十六进制字符串
     */
    public function createTransaction(
        bool $isCreate,
        string $name,
        string $code,
        string $abi,
        string $alias,
        string $note,
        int $amount,
        int $fee,
        int $gasPrice,
        int $gasLimit
    ): string {
        return $this->client->CreateTransaction([
            'execer'     => 'evm',
            'actionName' => 'CreateCall',
            'payload'    => [
                'isCreate' => $isCreate,
                'name'     => $name,
                'code'     => $code,
                'abi'      => $abi,
                'alias'    => $alias,
                'note'     => $note,
                'amount'   => $amount,
                'fee'      => $fee,
                'gasLimit' => $gasPrice,
                'gasPrice' => $gasLimit,
            ],
        ]);
    }

    /**
     * Notes   : EVM合约只读调用（通过ABI）
     * @Date   : 2021/1/27 2:04 下午
     * @Author : < Jason.C >
     * @param  string  $address  合约地址
     * @param  string  $input    abi方法及参数
     * @param  string  $caller   本次调用的发起者，如果不填写则认为EVM合约自身发起的调用
     * @return mixed
     */
    public function readonly(string $address, string $input, string $caller)
    {
        return $this->client->Query([
            'execer'   => 'evm',
            'funcName' => 'Query',
            'payload'  => [
                'address' => $address,
                'input'   => $input,
                'caller'  => $caller,
            ],
        ]);
    }

    /**
     * Notes   : 估算合约调用Gas消耗
     * @Date   : 2021/1/27 1:53 下午
     * @Author : < Jason.C >
     * @param  string  $to      目标地址，如果为创建合约，这里留空，如果为调用合约这里填写合约地址
     * @param  string  $code    需要部署或调用的合约代码，如果是部署合约，本字段必填
     * @param  string  $abi     需要部署或调用的合约ABI代码
     * @param  string  $caller  本次调用的发起者，如果不填写则认为EVM合约自身发起的调用
     * @param  int     $amount  合约调用时，如果需要传递金额，通过这个参数
     * @return int              本次交易需要消耗的gas值
     */
    public function estimateGas(string $code): int
    {
        return $this->client->Query([
            'execer'   => 'evm',
            'funcName' => 'EstimateGas',
            'payload'  => [
                'code' => $code,
            ],
        ])['gas'];
    }

    /**
     * Notes   : 查询EVM合约地址
     * EVM合约有两个标识，一个是合约地址，一个是合约名称，两者为一对一的唯一对应关系，
     * 因为系统设计原因，在涉及到转账操作时必需使用合约名称进行操作，所以本接口提供了两者的互查能力；
     * @Date   : 2021/1/27 1:57 下午
     * @Author : < Jason.C >
     * @param  string  $addr  合约地址或合约名称，填写任何一个，则返回另外一个
     * @return array
     *                        "contract":bool,  本地址下是否存在EVM合约
     *                        "contractAddr":"string", 本合约地址
     *                        "contractName":"string", 本合约名称
     *                        "aliasName":"string" 本合约别名
     */
    public function checkAddr(string $addr): array
    {
        return $this->client->Query([
            'execer'   => 'evm',
            'funcName' => 'CheckAddrExists',
            'payload'  => [
                'addr' => $addr,
            ],
        ]);
    }

    /**
     * Notes   : 查询合约ABI
     * @Date   : 2021/1/27 2:01 下午
     * @Author : < Jason.C >
     * @param  string  $address  EVM合约地址
     * @return array
     *                           "address":"string", 本合约地址
     *                           "abi":"string" 本合约绑定的ABI
     */
    public function queryABI(string $address): array
    {
        return $this->client->Query([
            'execer'   => 'evm',
            'funcName' => 'QueryABI',
            'payload'  => [
                'address' => $address,
            ],
        ]);
    }

    /**
     * Notes   : EVM调试设置
     * @Date   : 2021/1/27 2:08 下午
     * @Author : < Jason.C >
     * @param  int  $optype  操作类型，0：查询调试状态， 1：打开， -1：关闭
     * @return bool          当前调试开关状态
     */
    public function evmDebug(int $optype): bool
    {
        return $this->client->Query([
            'execer'   => 'evm',
            'funcName' => 'EvmDebug',
            'payload'  => [
                'optype' => $optype,
            ],
        ])['debugStatus'];
    }

}
