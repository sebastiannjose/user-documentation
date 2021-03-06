<?hh // strict
/*
 *  Copyright (c) 2004-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the BSD-style license found in the
 *  LICENSE file in the root directory of this source tree. An additional grant
 *  of patent rights can be found in the PATENTS file in the same directory.
 *
 */

namespace Facebook\HHAPIDoc\PageSections;

use type Facebook\DefinitionFinder\ScannedFunctionish;

class FunctionishSignature extends PageSection {
  <<__Override>>
  public function getMarkdown(): ?string {
    $f = $this->definition;
    if (!$f instanceof ScannedFunctionish) {
      return null;
    }

    $str = _Private\stringify_functionish_signature(
      _Private\StringifyFormat::MULTI_LINE,
      $f,
      $this->docBlock,
    );

    return "```Hack\n".$str."\n```";
  }
}
