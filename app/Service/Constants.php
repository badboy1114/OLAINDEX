<?php
/**
 * This file is part of the wangningkai/olaindex.
 * (c) wangningkai <i@ningkai.wang>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Service;


class Constants
{
    const LOGO
        = <<<EOF
   ____  __    ___    _____   ______  _______  __
  / __ \/ /   /   |  /  _/ | / / __ \/ ____/ |/ /
 / / / / /   / /| |  / //  |/ / / / / __/  |   /
/ /_/ / /___/ ___ |_/ // /|  / /_/ / /___ /   |
\____/_____/_/  |_/___/_/ |_/_____/_____//_/|_|
EOF;
    const VERSION = 'v5.0';

    const DEFAULT_RETRY = 3; // 默认重试次数
    const DEFAULT_TIMEOUT = 120; // 默认超时时间
    const DEFAULT_CONNECT_TIMEOUT = 5; // 默认连接超时时间

}
