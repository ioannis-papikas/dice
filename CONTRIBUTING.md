## Bug Reports ##

To encourage active collaboration, we strongly encourage pull requests, not just bug reports.
"Bug reports" may also be sent in the form of a pull request containing a failing test.

However, if you file a bug report, your issue should contain a title and a clear description of the issue.
You should also include as much relevant information as possible and a code sample that demonstrates the issue.
The goal of a bug report is to make it easy for yourself - and others - to replicate the bug and develop a fix.

Creating a bug report serves to help yourself and others start on the path of fixing the problem.

The Dice source code is managed on GitHub, on this repository.


## Selecting the proper branch ##

All bug fixes should be sent to the latest stable branch.
Bug fixes should never be sent to the master branch unless they fix features that exist only in the upcoming release.

Minor features that are fully backwards compatible with the current release may be sent to the latest stable branch.

Major new features should always be sent to the master branch, which contains the upcoming release.


## Coding Style ##

Dice follows the PSR-2 coding standard and the PSR-4 auto-loading standard.


## PHPDoc ##

Below is an example of a valid documentation block. Note the empty line between parameters and the return statement.
Allow one empty space between @param and the type of the parameter:

```php
/**
 * Register a binding with the container.
 *
 * @param string      $param1
 * @param string|null $default
 * 
 * @return void
 */
public function doSomething($param1, $default = null)
{
    //
}
```

### StyleCI ###
Don't worry if your code styling isn't perfect! We are using [StyleCI](https://styleci.io/) to help us out.
StyleCI will automatically merge any style fixes into the repository after pull requests are merged.
This allows us to focus on the content of the contribution and not the code style.
