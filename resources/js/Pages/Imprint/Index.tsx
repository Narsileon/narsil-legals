import { useTranslationsStore } from "@narsil-ui/Stores/translationStore";
import parse from "html-react-parser";
import Section from "@narsil-ui/Components/Section/Section";
import SectionContent from "@narsil-ui/Components/Section/SectionContent";
import SectionFullscreenToggle from "@narsil-ui/Components/Section/SectionFullscreenToggle";
import SectionHeader from "@narsil-ui/Components/Section/SectionHeader";
import SectionTitle from "@narsil-ui/Components/Section/SectionTitle";

interface Props {
	content: string;
}

const Index = ({ content }: Props) => {
	const { trans } = useTranslationsStore();

	return (
		<Section>
			<SectionHeader>
				<SectionTitle>{trans("Imprint")}</SectionTitle>
				<SectionFullscreenToggle />
			</SectionHeader>
			<SectionContent className='prose max-w-none'>{parse(content)}</SectionContent>
		</Section>
	);
};

export default Index;
