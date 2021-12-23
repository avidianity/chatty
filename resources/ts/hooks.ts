import { useLocalStorage } from '@avidian/hooks';

export function useToken(): [
    string | null,
    React.Dispatch<React.SetStateAction<string | null>>
] {
    const { value, setValue } = useLocalStorage<string | null>('chatty', '');

    return [value, setValue];
}
