
# Progress

Progress is used to calculate the stages of completion of a process in percentage. First you have to create a Builder object. The next step is to make a maximum progress value limit, then do a scoring to check how many stages of progress in the scoring function.

## Installation

Use the package manager [composer](https://getcomposer.org) to install nik-parser.

```bash  
composer require nurmanhabib/progress
```  

## Usage

### 1. Create Builder
```php  
<?php  
  
require "vendor/autoload.php";  

use Nurmanhabib\Progress\Builder;  
use Nurmanhabib\Progress\Progress;  
  
class MyProgress implements Builder  
{
    protected Progress $progress;  

    public function prepare()  
    {  
        $this->progress = new Progress(2);  
    }  

    public function scoring()  
    {
        if (true) {  
            $this->progress->advance();  
        }

        if (false) {  
            $this->progress->advance();  
        }  
    }

    public function getScore(): Progress  
    {
        return $this->progress;  
    }  
} 
```  

### 2. Call with Director

```php
<?php

use Nurmanhabib\Progress\ProgressDirector;

$builder = new MyProgress;
$director = new ProgressDirector($builder);
$progress = $director->build();

echo $progress->getMaxValue(); // 2
echo $progress->getGivenValue(); // 1
echo $progress->getPercentageValue(); // 50
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
