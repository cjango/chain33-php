<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: transaction.proto

namespace GPBMetadata;

class Transaction
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Common::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0ae1190a117472616e73616374696f6e2e70726f746f121d4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f62756622360a0d41737365747347656e65736973120e0a06616d6f756e7418022001280312150a0d72657475726e4164647265737318032001280922650a144173736574735472616e73666572546f4578656312110a09636f696e746f6b656e180120012809120e0a06616d6f756e74180220012803120c0a046e6f746518032001280c12100a08657865634e616d65180420012809120a0a02746f180520012809225f0a0e417373657473576974686472617712110a09636f696e746f6b656e180120012809120e0a06616d6f756e74180220012803120c0a046e6f746518032001280c12100a08657865634e616d65180420012809120a0a02746f180520012809224d0a0e4173736574735472616e7366657212110a09636f696e746f6b656e180120012809120e0a06616d6f756e74180220012803120c0a046e6f746518032001280c120a0a02746f18042001280922350a054173736574120c0a0465786563180120012809120e0a0673796d626f6c180220012809120e0a06616d6f756e74180320012803229d010a084372656174655478120a0a02746f180120012809120e0a06616d6f756e74180220012803120b0a03666565180320012803120c0a046e6f746518042001280c12120a0a69735769746864726177180520012808120f0a076973546f6b656e18062001280812130a0b746f6b656e53796d626f6c18072001280912100a08657865634e616d65180820012809120e0a0665786563657218092001280922520a0c526557726974655261775478120a0a027478180120012809120a0a02746f180320012809120e0a06657870697265180420012809120b0a03666565180520012803120d0a05696e64657818062001280522250a164372656174655472616e73616374696f6e47726f7570120b0a0374787318012003280922180a08556e7369676e5478120c0a046461746118012001280c22500a0c4e6f42616c616e6365547873120e0a06747848657873180120032809120f0a0770617941646472180220012809120f0a07707269766b6579180320012809120e0a06657870697265180420012809224e0a0b4e6f42616c616e63655478120d0a057478486578180120012809120f0a0770617941646472180220012809120f0a07707269766b6579180320012809120e0a0665787069726518042001280922d5010a0b5472616e73616374696f6e120e0a0665786563657218012001280c120f0a077061796c6f616418022001280c123b0a097369676e617475726518032001280b32282e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e5369676e6174757265120b0a03666565180420012803120e0a06657870697265180520012803120d0a056e6f6e6365180620012803120a0a02746f18072001280912120a0a67726f7570436f756e74180820012805120e0a0668656164657218092001280c120c0a046e657874180a2001280c22470a0c5472616e73616374696f6e7312370a0374787318012003280b322a2e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e5472616e73616374696f6e22500a0d52696e675369676e6174757265123f0a056974656d7318012003280b32302e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e52696e675369676e61747572654974656d22360a1152696e675369676e61747572654974656d120e0a067075626b657918012003280c12110a097369676e617475726518022003280c223a0a095369676e6174757265120a0a027479180120012805120e0a067075626b657918022001280c12110a097369676e617475726518032001280c22410a0c416464724f76657276696577120f0a0772656369766572180120012803120f0a0762616c616e6365180220012803120f0a077478436f756e7418032001280322660a0752657141646472120c0a0461646472180120012809120c0a04666c6167180220012805120d0a05636f756e7418032001280512110a09646972656374696f6e180420012805120e0a06686569676874180520012803120d0a05696e64657818062001280322130a054865785478120a0a02747818012001280922700a0b5265706c795478496e666f120c0a046861736818012001280c120e0a06686569676874180220012803120d0a05696e64657818032001280312340a0661737365747318042003280b32242e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e4173736574221a0a0952657154784c697374120d0a05636f756e7418012001280322460a0b5265706c7954784c69737412370a0374787318012003280b322a2e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e5472616e73616374696f6e221e0a0d5265714765744d656d706f6f6c120d0a056973416c6c180120012808222f0a0c52657150726f706572466565120f0a077478436f756e74180120012805120e0a06747853697a6518022001280522230a0e5265706c7950726f70657246656512110a0970726f706572466565180120012803223b0a0a5478486173684c697374120e0a0668617368657318012003280c120d0a05636f756e74180220012803120e0a06657870697265180320032803224b0a0c5265706c795478496e666f73123b0a077478496e666f7318012003280b322a2e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e5265706c795478496e666f22250a0a526563656970744c6f67120a0a027479180120012805120b0a036c6f6718022001280c2283010a0752656365697074120a0a02747918012001280512330a024b5618022003280b32272e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e4b657956616c756512370a046c6f677318032003280b32292e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e526563656970744c6f6722520a0b5265636569707444617461120a0a02747918012001280512370a046c6f677318032003280b32292e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e526563656970744c6f6722c9010a085478526573756c74120e0a06686569676874180120012803120d0a05696e64657818022001280512360a02747818032001280b322a2e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e5472616e73616374696f6e123f0a0b726563656970746461746518042001280b322a2e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e526563656970744461746112110a09626c6f636b74696d6518052001280312120a0a616374696f6e4e616d651806200128092282030a115472616e73616374696f6e44657461696c12360a02747818012001280b322a2e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e5472616e73616374696f6e123b0a077265636569707418022001280b322a2e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e5265636569707444617461120e0a0670726f6f667318032003280c120e0a06686569676874180420012803120d0a05696e64657818052001280312110a09626c6f636b74696d65180620012803120e0a06616d6f756e7418072001280312100a0866726f6d6164647218082001280912120a0a616374696f6e4e616d6518092001280912340a06617373657473180a2003280b32242e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e417373657412380a08747850726f6f6673180b2003280b32262e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e547850726f6f6612100a0866756c6c48617368180c2001280c22530a125472616e73616374696f6e44657461696c73123d0a0374787318012003280b32302e4a61736f6e2e436861696e33332e4b65726e656c2e50726f746f6275662e5472616e73616374696f6e44657461696c22190a085265714164647273120d0a05616464727318012003280922280a175265714465636f64655261775472616e73616374696f6e120d0a057478486578180120012809222b0a09557365725772697465120d0a05746f706963180120012809120f0a07636f6e74656e7418022001280922400a0b557067726164654d65746112100a087374617274696e67180120012808120f0a0776657273696f6e180220012809120e0a0668656967687418032001280322340a0d5265715478486173684c697374120e0a0668617368657318012003280912130a0b697353686f727448617368180220012808223a0a07547850726f6f66120e0a0670726f6f667318012003280c120d0a05696e64657818022001280d12100a08726f6f744861736818032001280c620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}
