<?php
require_once "ContainsSubstringConstraint.php";

class ContainsSubstringConstraintTest extends PHPUnit_Framework_TestCase
{
    public function testContainsSubstringConstraint()
    {
        $strings = array(
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse congue tincidunt mi, eu cursus magna tempus quis. Aliquam erat volutpat. Integer dictum risus non quam pellentesque ultrices. Morbi porttitor quam eget quam iaculis eu porta tellus volutpat. Nullam gravida semper sapien, a egestas libero feugiat ut. Mauris vehicula semper nunc suscipit consectetur. Proin purus turpis, ornare quis pharetra ac, egestas et arcu. In dolor arcu, sollicitudin vitae pretium ut, consectetur et ipsum. Quisque viverra nisl et purus sodales mollis.",
            "Maecenas euismod lorem at leo pretium vehicula. Aliquam libero nunc, blandit at accumsan tincidunt, auctor vitae urna. Etiam accumsan elementum ligula, eu volutpat nisl consequat sit amet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam imperdiet imperdiet erat, vitae imperdiet dolor gravida sit amet. Pellentesque id risus leo. Vestibulum in ultrices nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque dictum scelerisque massa at luctus.",
            "Sed risus urna, varius ac sodales sed, sodales at erat. Sed eu tellus ac mi interdum iaculis id et felis. Sed sit amet vulputate orci. Curabitur porttitor adipiscing felis, id mollis ante interdum id. Donec tempus mattis orci vel faucibus. Sed id nibh et augue molestie imperdiet."
        );

        // should be found
        $this->assertThat($strings, new ContainsSubstringConstraint("Suspendisse congue tincidunt mi, eu cursus magna tempus quis"));

        // should not be found
        $this->assertThat($strings,
            $this->logicalNot(new ContainsSubstringConstraint("This string should not be found.")));

        // should be found && should contains strings only
        $this->assertThat($strings,
            $this->logicalAnd(
                new PHPUnit_Framework_Constraint_TraversableContainsOnly("string"),
                new ContainsSubstringConstraint("Aliquam libero nunc")
            )
        );
    }
}