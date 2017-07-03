<?php
/**
 * Created by PhpStorm.
 * User: seuic
 * Date: 2017/6/19
 * Time: 10:02
 */
namespace App\Tests;

interface TestInterface {

    const NAME = 'Interface constant';

    public function index($pageSize = 10);

    public function save();

    public function edit($id);

    public function update($id);

    public function delete($id);






}